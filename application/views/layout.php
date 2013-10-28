    <html>
    <head>
        <title>.: Aplikasi Penjualan - <?php echo $title; ?> :.</title>
    </head>
    <body>
        <table border="0" width="100%">
            <tr bgcolor="#87CEEB">
                <td align="center"><h1>Aplikasi Penjualan</h1></td>
            </tr>
            <tr>
                <td valign="top">
                    <table border="0" width="100%">
                        <tr heigth="100%">
                            <td width="20%" valign="top" align="left">                                
                                <ul>
                                    <li><?php echo anchor('welcome', 'Home'); ?></li>
                                    <li><?php echo anchor('products', 'Product'); ?></li>
                                    <li><?php echo anchor('customers', 'Customer'); ?></li>
                                    <li><?php echo anchor('trans', 'Penjualan'); ?></li>
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
                <td align="center" bgcolor="#708090">
                    <small>Copyright &copy; 2012</small>
                </td>
            </tr>
        </table>
    </body>
</html>