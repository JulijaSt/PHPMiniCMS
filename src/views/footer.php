<?php

function footer($footer) {
    print ("<footer class='" .$footer . "'>
                <div class='footer__wrapper'>
                    <h6 class='footer__copyright'>copyright &copy" . date("Y") . " Mini CMS</h6>
                </div>
            </footer>");
}

?>