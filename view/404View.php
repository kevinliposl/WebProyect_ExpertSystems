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
        <div class="not-found-title">we are sorry</div>
        <div class="not-found-message">We seem to have lost this page, try one of these instead</div>
    </div>
</div>

<?php

include_once 'public/footer.php';
