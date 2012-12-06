<?php
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {
    public function Header() {
        // Clear default header output
    }

    public function Footer() {
        // Clear default footer output
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

ob_start();
?>
<style>
.table-format {
    padding: 6px;
    width: 100%;
    font-size: 0.8em;
}

.table-format th {
    border: .5px solid #777;
    background-color: #eee;
    font-weight: bold;
    text-align: center;
}

.table-format td {
    border: .5px solid #777;
}
</style>
<table class="table-format">
    <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <th>Column 3</th>
        <th>Column 4</th>
    </tr>
    <?php
    for($i = 1; $i <= 10; $i++) {
    ?>
        <tr>
            <td>Value 1</td>
            <td>Value 2</td>
            <td>Value 3</td>
            <td>Value 4</td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
$html_result = trim(ob_get_clean());

$pdf->AddPage();
$pdf->writeHTML($html_result);
$pdf->lastPage();
$pdf->Output('doc.pdf', 'D');
