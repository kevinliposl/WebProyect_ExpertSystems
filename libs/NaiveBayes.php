<?php

class NaiveBayes {

    private $labels;
    private $possibleValues;
    private $m;

    private $classQuantity;
    private $classProbability;
    private $probabilityValueFeatures;

    private $chanceClassFrequency;

    function __construct() {
        
        $this->labels = array();
        $this->possibleValues = array();
        $this->m = 0;

        $this->classQuantity = array();
        $this->classProbability = array();
        $this->probabilityValueFeatures = array();
        
        $this->chanceClassFrequency = array();
    }

    /*
        Este método está encargado de ejecutar el entrenamiento con el TrainingSet brindado
    */
    function training($resultStyleData, $labels, $possibleValues) {

        $this->labels = $labels;
        $this->possibleValues = $possibleValues;
        $this->m = count($this->labels) - 1;

        $this->countClass($resultStyleData);
        $this->classProbability($resultStyleData);
        $this->probabilityForValueFeatures();
        $this->frequenciesClass($resultStyleData);
    }

    /*
        Este método cuenta cada una de las clases del Training Set
        Siempre la variable Labels, su última columna debe ser la columna de clases.
    */
    function countClass($resultStyleData){
        $keys = array_keys($this->labels);
        $this->classQuantity = array_column($resultStyleData, $keys[count($keys) - 1]);
        $this->classQuantity = array_count_values($this->classQuantity);
    }

    /*
        Este método calcula la probabilidad de cada una de las clases según la cantidad todal del Trainig Set.
    */
    function classProbability($resultStyleData){
        foreach ($this->classQuantity as $key => $value) {
            $this->classProbability[$key] = number_format(($value/count($resultStyleData)),10,'.','');
        }
    }

    /*
        Este método calcula la probabilidad de cada Caracteristica
        (Probability p)
    */
    function probabilityForValueFeatures(){
        foreach ($this->labels as $key => $value) {
            $this->probabilityValueFeatures[$key] = number_format((1/$value),10,'.','');
        }
        array_pop($this->probabilityValueFeatures);
    }

    /*
        Este método calcula la totalidad que se repite cada valor de la caracteristica
        Calcula también la probabilidad de cada frecuencia de cada clase
    */
    function frequenciesClass($resultStyleData){
        
        $keysLabels = array_keys($this->labels);
        for ($i=0; $i < (count($keysLabels) - 1) ; $i++) {

            $features = array();
            for ($j=0 ; $j < count($this->possibleValues[$keysLabels[$i]]); $j++) {

                    $x = 0; 
                    $totalClassFrecuencies = array();
                    foreach ($this->possibleValues[$keysLabels[count($keysLabels) - 1]] as $key => $value) {

                        $featureTempOne = array_column($resultStyleData, $keysLabels[$i]);
                        $featureTempTwo = array_column($resultStyleData, $keysLabels[count($keysLabels) - 1]);
                        $totalFeatureProbabilityValue = $this->totalFeature($this->possibleValues[$keysLabels[$i]][$j], $value, $featureTempOne, $featureTempTwo);
                        $totalFeatureProbabilityValue = number_format(
                            (($totalFeatureProbabilityValue + $this->m * $this->probabilityValueFeatures[$keysLabels[$i]])
                                    /($this->classQuantity[$value] + $this->m)),10,'.','');
                        
                        $totalClassFrecuencies[$this->possibleValues[$keysLabels[count($keysLabels) - 1]][$x]] = $totalFeatureProbabilityValue; 
                        ($x == count($this->possibleValues[$keysLabels[count($keysLabels) - 1]]) - 1)? $x = 0: $x++;
                    }

                $features[$this->possibleValues[$keysLabels[$i]][$j]] = $totalClassFrecuencies;
            }

            $this->chanceClassFrequency[$keysLabels[$i]] = $features;
        }
    }

    /*
        Este método calcula la totalidad que se repite el valor de una caracteristica
     */
    function totalFeature($keyTop, $keyBot, $featureTempOne, $featureTempTwo){
        $total = 0;

        $featureTempOne = $this->trunc($featureTempOne);
        $featureTempTwo = $this->trunc($featureTempTwo);
        for ($i=0; $i < (count($featureTempOne)) ; $i++) { 
            if($featureTempOne[$i] == $keyTop && $featureTempTwo[$i] == $keyBot){
                $total++;
            }
        }

        return $total;
    }

    /*
        Este método trunca cualquier columna que tenga números decimales, ya que no se necesitan.
    */
    function trunc($array){
        for ($i=0; $i < count($array) ; $i++) { 
            if(is_numeric($array[$i])){
                $array[$i] = intval($array[$i]);
            }else{
                return $array;
            }
        }  
        return $array;
    }

    /*
        Este método guarda las variables con los datos necesarios para predecir según lo que envíe el usuario
    */
    function saveTraining($mode){
        require_once 'model/DestinyModel.php';
        $dModel = new DestinyModel();
        return $dModel->saveTraining($this->classProbability,$this->chanceClassFrequency, $mode);
    }

    /*
        Este método carga las variables con los datos necesarios para predecir según lo que envíe el usuario
    */
    function loadVariables($allTrainingData, $labels, $possibleValues){
        $this->labels = $labels;
        $this->possibleValues = $possibleValues;
        $this->classProbability = json_decode($allTrainingData[0]["classProbability"], true);
        $this->chanceClassFrequency = json_decode($allTrainingData[0]["chanceClassFrequency"], true);
    }

    /*
        Este método realiza la predicción con los datos que el usuario indicó y según los datos aprendidos
    */
    function predict($userValues){
        
        $userProbabilities = $this->loadProbabilities($userValues);
        $frecuencyProductoUser = $this->frecuencyProduct($userProbabilities, $userValues);
        $frecuencyProductoUser = $this->totalProbability($frecuencyProductoUser);
        $prediction = $this->selectPrediction($frecuencyProductoUser);

        return $prediction;
        
    }

    /*
        Este método carga las probabilidades según los datos obtenidos del usuario
    */
    function loadProbabilities($userValues){
        $keys = array_keys($this->labels);
        $userProbabilities = array();
        foreach ($userValues as $key => $value) {
            $probabilitiesTemp = array();
            for ($i=0; $i < count($this->possibleValues[$keys[count($keys) - 1]]) ; $i++) { 
                $probabilitiesTemp[$this->possibleValues[$keys[count($keys) - 1]][$i]] 
                = $this->chanceClassFrequency
                [$key][$value][$this->possibleValues[$keys[count($keys) - 1]][$i]];
            }
            $userProbabilities[$key][$value] = $probabilitiesTemp;
        }
        return $userProbabilities;
    }

    function frecuencyProduct($userProbabilities, $userValues){
        $keys = array_keys($this->labels);
        $frecuencyProductoUser = array();

        for ($i=0; $i < count($this->possibleValues[$keys[count($keys) - 1]]) ; $i++) { 
                $total = floatval(1);
                $probabilitiesTemp = array();
                foreach ($userValues as $key => $value) {
                    
                    $probabilitiesTemp[$this->possibleValues[$keys[count($keys) - 1]][$i]] =
                    number_format(($this->chanceClassFrequency
                        [$key][$value][$this->possibleValues[$keys[count($keys) - 1]][$i]] * $total), 17,'.','');

                    $total = $probabilitiesTemp[$this->possibleValues[$keys[count($keys) - 1]][$i]];
                }

              $frecuencyProductoUser[$i] = $probabilitiesTemp;
        }

        return $frecuencyProductoUser;
    }

    /*
        Este método realiza el calculo de la probabilidad total del producto de las frecuencias
    */
    function totalProbability($frecuencyProductoUser){
        $totalFrecuency = array();
        $keys = array_keys($this->labels);
        for ($i=0; $i < count($this->possibleValues[$keys[count($keys) - 1]]) ; $i++) { 
            $totalFrecuency[$this->possibleValues[$keys[count($keys) - 1]][$i]] = 
            number_format((($frecuencyProductoUser[$i][$this->possibleValues[$keys[count($keys) - 1]][$i]])
            / 
            $this->classProbability[$this->possibleValues[$keys[count($keys) - 1]][$i]]
            ), 17,'.','');
        }
        return $totalFrecuency;
    }

    function selectPrediction($frecuencyProductoUser){
        $keys = array_keys($this->labels);
        $major = 0;
        $class = "";

        foreach ($frecuencyProductoUser as $key => $value) {
            if($value >= $major ){
                $major = $value;
                $class = $key;
            }
        }

        return $class;
    }

    /*
        Este método es para fines de Debug, imprime los valores de todas las variables en memoria
    */
    function printNaiveBayesVariables(){
        echo 'Etiquetas de Atributos y los valores de caracteristica: <br>';
        var_dump($this->labels);
        echo '<br>';
        echo 'Cantidad de Clases: <br>';
        var_dump($this->classQuantity);
        echo '<br>';
        echo 'Probabilidad de las Clases: <br>';
        var_dump($this->classProbability);
        echo '<br>';
        echo 'Valor de Probabilidad de cada Caracteristica (p): <br>';
        var_dump($this->probabilityValueFeatures);
        echo '<br>';
        echo 'm = ' . $this->m;
        echo '<br>';
        echo 'Frecuencia de cada clase: <br>';
        var_dump($this->chanceClassFrequency);
        echo '<br>';
        echo 'Posibles valores que pueden tener cada atributo: <br>';
        var_dump($this->possibleValues);
    }
}
?>