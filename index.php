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

$pdf = new MYPDF();

ob_start();
?>
<style>
table {
    padding: 6px;
    width: 100%;
    font-size: 0.8em;
}

table th {
    border: .5px solid #777;
    background-color: #eee;
    font-weight: bold;
    text-align: center;
}

table td {
    border: .5px solid #777;
}
</style>
<table>
    <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <th>Column 3</th>
        <th>Column 4</th>
    </tr>
    <?php for($i = 1; $i <= 10; $i++): ?>
        <tr>
            <td>Value 1</td>
            <td>Value 2</td>
            <td>Value 3</td>
            <td>Value 4</td>
        </tr>
    <?php endfor; ?>
</table>
<?php
$html_result = trim(ob_get_clean());

$pdf->AddPage();
$pdf->writeHTML($html_result);
$pdf->lastPage();
$pdf->Output('doc.pdf', 'D');
