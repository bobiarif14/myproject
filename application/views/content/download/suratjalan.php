<html>
<style>
@page{margin:70px 50px;}
#header { position: fixed; left: 0px; top: -60px; right: 0px; height: 60px;color:#51C3E6; }
  </style>
<div id="header">
PT. Winsoft Globalindo International<br/>
Jl. Kemenangan III No 64 Jakarta Barat. Indonesia<br/>
Telp. 021-6327576 Fax. 021-7540467<br/>
Email. wglobalindo@gmail.com<br/>
www.winsoftgarment.com<br/>
 </div>
    <br/><center><h1>Surat Jalan Pengiriman Barang</h1>
    No: <?=$delivery_no?></center>
    <br/>
    Jakarta, <?=date('d F Y',strtotime($create_date))?><br/>
    <br/>
    Kepada Yth : 
    <br/><?=$customer_name?><br/>
    <br/>
    <table width="100%" border="1">
        <thead>
            <tr>
            <th>NO</th>
            <th>Product Description</th>
            <th>Qty</th>
            <th>PO Number</th>
            <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach($barang->result() as $b){
                echo "<tr>
                        <td>$i</td>
                        <td>$b->nama_barang</td>
                        <td>$b->jumlah $b->satuan</td>
                        <td>$b->no_po</td>
                        <td>$b->note</td>
                    </tr>";
            }
            ?>            
        </tbody>
    </table>
    <br/>
    <br/>
    <br/>
    <table width="100%">
        <tr>
            <td width="40%"><center>Penerima Barang</center></td>
            <td width="40%"><center>Pengantar Barang</center></td>
            <td><center>Hormat Kami</center></td>
        </tr>      
        <tr>
            <td width="40%"></td>
            <td width="40%"></td>
            <td><br/><br/><br/><br/><br/><br/></td>
        </tr>
        <tr height="50px">
            <td width="40%"><center>Nama & Cap Perusahaan</center></td>
            <td width="40%"></td>
            <td></td>
        </tr>
    </table>
            

    

</html>