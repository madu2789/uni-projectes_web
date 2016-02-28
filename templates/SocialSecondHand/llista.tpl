{$modules.head}
<div id="norm">
<br/>
    {if ($edita == 1 )}
        <h2>Llistat de tots els teus productes!</h2><br/><br/><br/>

        <h3>Edita</h3><br/><br/>
        {$modules.edita}

    {else}

        <h2>Llistat de tots els teus productes!</h2><br/><br/><br/>
        <h3>Edita o elimina els que desitgis!</h3><br/><br/>
        <ul>
            {section name=c start="0" loop=$Productes}

                <li><h4> Producte: {$Productes[$smarty.section.c.index].TitolProducte}</h4><br/>
                    <a href="/llista/edita/{$Productes[$smarty.section.c.index].IdProducte}" >Editar</a>
                    <a href="/llista/elimina/{$Productes[$smarty.section.c.index].IdProducte}" >Eliminar</a>
                    <br/>
                </li>
                <br/>
            {/section}
        </ul>
        <br/>

    {/if}

</div>
{$modules.footer}


