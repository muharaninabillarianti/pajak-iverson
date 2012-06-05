<html>
    <head>
        <title>.: Aplikasi Penjualan - <?php echo $title; ?> :.</title>
    </head>
    <body>
        <table border="1" width="100%">
            <tr bgcolor="#06FFFF">
                <td><h1>Aplikasi Penjualan</h1></td>
            </tr>
            <tr>
                <td valign="top">
                    <table border="1" width="100%">
                        <tr>
                            <td width="20%" valign="top" align="left">                                
                                <ul>
                                    <li><?php echo anchor('products', 'Product'); ?></li>
                                </ul>
                            </td>
                            <td>
                                <?php echo $content;?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <small>Copyright &copy; 2012</small>
                </td>
            </tr>
        </table>
    </body>
</html>