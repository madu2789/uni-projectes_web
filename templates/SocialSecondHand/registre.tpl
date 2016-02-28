{$modules.head}

<div id="norm">


<br/>
    <h2>Registre</h2><br/><br/><br/>

    <h3>{$error} </h3>
<div id="estil_1">
    <form action="/registre" method="post" enctype="multipart/form-data">
        <table width="204" height="215" border="3">
            <tr>
                <td width="35">Nom</td>
                <td width="149">
                    <label>
                        <input type="text" name="Nom" id="id_nom" value= "{$smarty.session.nom}"/>
                    </label></td>
            </tr>

            <tr>
                <td width="35">Cognom</td>
                <td width="149">
                    <label>
                        <input type="text" name="Cognom" value= "{$smarty.session.cognom}"/>
                    </label></td>
            </tr>

            <tr>
                <td width="35">Login</td>
                <td width="149">
                    <label>
                        <input type="text" name="Login" value= "{$smarty.session.login}"/>
                    </label></td>
            </tr>

            <tr>
                <td width="35">Mail</td>
                <td width="149">
                    <label>
                        <input type="text" name="Mail" value= "{$smarty.session.mail}"/>
                    </label></td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <label>
                        <input type="text" name="Password" value= "{$smarty.session.password}"/>
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
    <A HREF="/registre/benvinguda">{$link}</A>

    <br/>

{$modules.footer}

</div>



