<?php

$content = ob_get_contents();

ob_clean();

include "../template.php";
