{$modules.head}
<div id="content">

    <body>
    <h1>Index de videos</h1>

    <h2>Aqui tenim les diferents videos</h2>

    <ul>
    {section name=c start="1" loop=$num_videos}

        <li><h4> Video: {$smarty.section.c.index}</h4>

            <form action="/videoindex" method="post" enctype="multipart/form-data">
                <input type="text" name="Modifica{$smarty.section.c.index}" id="Modifica"/>
                <input name="Modifica" type="submit" id="Enviar" value="Modifica">
                <br/>
                <input name="Eliminar{$smarty.section.c.index}" type="submit" id="Eliminar" value="Eliminar"/>
            </form>
        </li>
        <br/>
    {/section}
    </ul>

    </body>

</div>
{$modules.footer}


