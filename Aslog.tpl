<html>
    <head>
        <title><[ $title|escape:'htmlall' ]></title>
            <link  rel="stylesheet" href="/assets/css/style.css" />
    </head>
    <body>
        <table border="1"> 
        <[ foreach from=$items key=key item=$value ]> 
            <tr>
                <th><[ $key|escape:'htmlall' ]></th>
                <td><pre style="text-align:left;"><[ $value|escape:'html' ]></pre> </td>
            </tr>
        <[ /foreach ]>
        </table>
<!--   <p ><?php echo "總共:{$total_item}筆-目前在第{$page}-共{$all_pages}頁"; ?></p> -->
        <p> <[ $pagedata|escape:'htmlall' ]> </p>
        <p>
        <[ $first ]>
        <[ $pre ]>在
        <[ $paging ]>頁
        <[ $nextpage ]>
        <[ $last ]>
        </p>        
    </body>
</html>

