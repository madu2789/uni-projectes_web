{$modules.head}

<div id="norm">
<br/>
    <h2>Login</h2><br/><br/><br/>

    <h3>Introdueix el teu mail i password: </h3><br/><br/>

    {$error}
<div id="estil_1">
    <form action="/login" method="post" enctype="multipart/form-data">
        <table width="204" height="215" border="3">
            <tr>
                <td width="35">Mail</td>
                <td width="149">
                    <label>
                        <input type="text" name="Mail"/>
                    </label></td>
            </tr>

            <tr>
                <td width="35">Password</td>
                <td width="149">
                    <label>
                        <input type="text" name="Password"/>
                    </label></td>
            </tr>

            <tr>
                <td height="41">&nbsp;</td>
                <td>
                    <label></label>
                    <input name="Enviar" type="submit" id="Enviar" value="Enviar"/></td>
            </tr>
        </table>
    </form>
</div>
    <br/>

{$modules.footer}

</div>



