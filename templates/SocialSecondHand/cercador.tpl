{$modules.head}

<div id="norm">

        <h2>Cercador de productes!</h2><br/><br/>
		
<div id="estil_1">
    <form action="/cerca" method="post" enctype="multipart/form-data">
        <table width="204" height="215" border="3">
            <tr>
                <td width="35">Introdueix que vols cercar</td>
                <td width="149">
                    <label>
                        <input type="text" name="Cerca"/>
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
    <br/><br/><br/>

    {$Error}

        <ul>
            {section name=c start="0" loop=$Productes}

                <li>
                    <a href="/p/{$Productes[$smarty.section.c.index].TitolProducte}" >{$Productes[$smarty.section.c.index].TitolProducte}</a>
                    <h4> Descripcio: {$Productes[$smarty.section.c.index].Descripcio}</h4>
                    <h4> Estat: {$Productes[$smarty.section.c.index].Estat}</h4>
                    <h4> Preu: {$Productes[$smarty.section.c.index].Preu}</h4>
                    <h4> Data de Creacio: {$Productes[$smarty.section.c.index].DataCreacio}</h4>
                    <br/>
                </li>
                <br/>
            {/section}
        </ul>
        <br/>

        {$modules.footer}

</div>



