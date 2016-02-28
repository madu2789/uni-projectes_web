{$modules.head}
<div id="content">

    <h2>Videos: </h2>

{$modules.madu}

{$modules.xavi}

{$modules.alain}

    <br/>

{if ($id == 0 || $id == 1 )}
    <input type="button" value="Enrere" onclick="window.location='/videos/{$id}' ">
    <input type="button" value="Seguent" onclick="window.location='/videos/{$id+1}' ">
    {else}
    {if ($id < $pags && $id > 1 )}
        <input type="button" value="Enrere" onclick="window.location='/videos/{$id-1}' ">
        <input type="button" value="Seguent" onclick="window.location='/videos/{$id+1}' ">
        {else}
        {if ($id >= $pags)}
            <input type="button" value="Enrere" onclick="window.location='/videos/{$id-1}' ">
            <input type="button" value="Seguent" onclick="window.location='/videos/{$id}' ">
            {else}
        {/if}
    {/if}
{/if}
    <br/>

</div>
{$modules.footer}


