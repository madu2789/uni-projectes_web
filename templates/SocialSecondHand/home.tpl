{$modules.head}

<div id="norm">
<br/>
    <h2>Benvinguts a la Home! </h2>
    <br/><br/><br/>

    <ul>
        <li>
            <a href="/registre/">Registrat!</a>
            <br/>
        </li>
        <li>
            <a href="/login/">Fes Login clicant aqui!</a>
            <br/>
        </li>
        <li>
            <a href="/crea/">Crea un nou producte!</a>
            <br/>
        </li>
        <li>
            <a href="/llista/">Llista els teus productes!</a>
            <br/>
        </li>
        <li>
            <a href="/cerca/">Cerca productes!</a>
            <br/>
        </li>
    </ul>

    <h2>Ultim Producte venut: {$Error} </h2>

    <h4>Titol: {$TitolProducte}</h4>

    <h4>Descripcio: {$Descripcio}</h4>

    <h4>Preu: {$Preu}</h4>

    <h4>Estat: {$Estat}</h4>

    <br/>
    <br/>
    <br/>

    <h3>Ultims productes inserits: </h3>

{section name=c start="0" loop="10"}

    <li><h2> Producte: {$smarty.section.c.index+1}</h2>
        <a href="p/{$Productes[$smarty.section.c.index].TitolProducte}">{$Productes[$smarty.section.c.index].TitolProducte}</a>

        <h4>Descripcio: {$Productes[$smarty.section.c.index].Descripcio}</h4>

        <h4>Preu: {$Productes[$smarty.section.c.index].Preu}</h4>

        <h4>Estat: {$Productes[$smarty.section.c.index].Estat}</h4>

        <br/>
    </li>
    <br/>
{/section}


</div>
{$modules.footer}

