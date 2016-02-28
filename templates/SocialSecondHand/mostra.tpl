{$modules.head}

<div id="norm">
<br/>
    <h2>{$Mode} </h2>

    <h3>{$Error} </h3>

    <br/>
	<h4>Títol del producte: {$TitolProducte}<h4><br/>

	<h4>Descripcio: {$Descripcio}<h4><br/>

	<h4>Preu: {$Preu}<h4><br/>

	<h4>Estat: {$Estat}<h4><br/>

	<h4>NomPropietari: {$NomPropietari}<h4><br/>

	<h4>Venut: {$Venut}<h4><br/>

	<h4>DataCreacio: {$DataCreacio}<h4><br/>

    <h4>Nom del venedor: {$NomVenedor}<h4><br/>

    <h4>Login del venedor: {$LoginVenedor}<h4><br/>

    <img name="foto" id="foto" src= "\imag\{$IdProducte}_2.jpeg" border='0' width='704' height='528'>

    <input type="button" id = "confirma" value="{$Confirma}" onclick="window.location='/p/{$TitolProducte}/confirmacio' ">



</div>

{$modules.footer}

