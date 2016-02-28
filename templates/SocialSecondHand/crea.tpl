
{if ($Tipus == "crea")}
    {$modules.head}
{/if}

<div id="norm">
    <br/>

    <h2>{$Tipus} un nou proucte a la venta</h2><br/><br/>

    <h3>Introdueix les dades del producte </h3><br/><br/>

{$error}
    <div id="estil_2">
        <form action=" " method="post" enctype="multipart/form-data">
            <table width="304" height="215" border="4">

                <tr>
                    <td width="35">T&iacute;tol del producte</td>
                    <td width="249">
                        <label>
                            <input type="text" name="TitolProducte" value="{$smarty.session.TitolProducte}"/>
                        </label></td>
                </tr>

                <tr>
                    <td width="35">Descripci&oacute;</td>
                    <td width="249">
                        <label>
                            <input type="text" name="Descripcio" value="{$smarty.session.Descripcio}"/>
                        </label></td>
                </tr>

                <tr>
                    <td width="35">Preu</td>
                    <td width="249">
                        <label>
                            <input type="text" name="Preu" value="{$smarty.session.Preu}"/>
                        </label></td>
                </tr>

                <tr>
                    <td width="35">Estat</td>
                    <td width="249">
                        <label>
                            <input type="text" name="Estat" value="{$smarty.session.Estat}"/>
                        </label></td>
                </tr>

                <tr>
                    <td width="35">Imatge</td>
                    <td width="249">
                        <label>
                        {if ($Tipus == "edita")}
                            <img name="foto" id="foto" src="\imag\{$Imatge}_2.jpeg" border='0' width='100' height='100'>
                        {/if}
                            <input name="upfile" id="upfile" type="file" src="{$DireImatge}" value="{$Imatge}"
                                   checked="true"/><br>
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


</div>
{$modules.footer}

