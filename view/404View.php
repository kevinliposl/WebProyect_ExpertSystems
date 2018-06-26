<?php

$session = SSession::getInstance();
if (isset($session->role)) {
    if ($session->role === "adm") {
        include_once 'public/header_adm.php';
    } else {
        include_once 'public/header_usr.php';
    }
} else {
    include_once 'public/header.php';
}
?>

<script>
    (function () {
        $("#body").addClass("bg-dr-blue-2");
    })();
</script>

<div class="not-found style-2">
    <div class="not-found-label">
        <div class="not-found-number">
            <h2>404</h2>
            <h3>Not Found</h3>
        </div>
        <div class="not-found-line"></div>
        <div class="not-found-title">Lo sentimos...</div>
        <div class="not-found-message">Parece que hemos perdido esta página, pruébalo más tarde.</div>
    </div>
</div>

<?php

include_once 'public/footer.php';
