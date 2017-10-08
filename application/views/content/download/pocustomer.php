<html>
<style>
@page{margin:70px 50px;}
#header { position: fixed; left: 0px; top: -50px; right: 0px; height: 50px; text-align: center;color:#51C3E6; }
#footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 100px;}
  </style>
   <div id="header">
   <h2>PT WINSOFT GLOBALINDO INTERNATIONAL</h2>
 </div>
 <div id="footer">
 PT. Winsoft Globalindo International<br/>
 Jl. Kemenangan III No 64 Jakarta Barat. Indonesia<br/>
 Telp. 021-6327576 Fax. 021-7540467<br/>
 Email. wglobalindo@gmail.com<br/>
 www.winsoftgarment.com
 </div>
    <center><h1>Purchase Order</h1></center>
    <br/>
    <strong>No PO : <?=$no_po?><strong><br/>
    Jakarta, <?=date('d F Y',strtotime($create_date))?><br/>
    <br/>
    TO : <?=$customer_name?><br/>
    UP : <?=$name_pic?><br/>
    From : Natassya - SB<br/>
    <br/>
    <table width="100%" border="1">
        <thead>
            <tr>
            <th>NO</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Less</th>
            <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $overall = 0;
            foreach($barang->result() as $b){
                $total = ($b->jumlah * $b->harga);
                echo "<tr>
                        <td>$i</td>
                        <td>$b->nama_barang</td>
                        <td>$b->jumlah $b->satuan</td>
                        <td>$b->harga $mata_uang</td>
                        <td></td>
                        <td>$total</td>
                    </tr>";
                    $i++;
                $overall += $total;
            }
            ?>
            <tr>
                <td colspan=4>Total</td>
                <td colspan=2><?=$overall?> <?=$mata_uang?></td>                
            </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <br/>
    <table width="100%">
        <tr>
            <td width="80%"></td>
            <td><center>Best Regards</center></td>
        </tr>      
        <tr>
            <td width="80%"></td>
            <td><br/><br/><br/><br/><br/><br/></td>
        </tr>
        <tr height="50px">
            <td width="80%"></td>
            <td><center>Natassya liu</center></td>
        </tr>
    </table>
            

    

</html>