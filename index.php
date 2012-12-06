<?php

ob_start();
?>
<table>
    <tr>
       <td>
    </tr>
</table>
<?php
$html = ob_end_clean();

echo $html;
