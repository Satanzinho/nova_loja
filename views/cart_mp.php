<h1>Checkout Mercado Pago</h1>
<?php if(!empty($error)): ?>
<div class="warn">
	<?php echo $error; ?>
</div>
<?php endif; ?>
<h3>Dados Pessoais</h3>
<form method="POST">
<strong>Nome:</strong><br/>
<input type="text" name="name" value="Jorge Luiz Valente" /><br/><br/>

<strong>CPF:</strong><br/>
<input type="text" name="cpf" value="13085251766" /><br/><br/>

<strong>Telefone:</strong><br/>
<input type="text" name="telefone" value="22992914959" /><br/><br/>

<strong>E-mail:</strong><br/>
<input type="email" name="email" value="teste@gmail.com" /><br/><br/>

<strong>Senha:</strong><br/>
<input type="password" name="password" value="senha" /><br/><br/>

<h3>Informações de Endereço</h3>

<strong>CEP:</strong><br/>
<input type="text" name="cep" value="28941394" /><br/><br/>

<strong>Rua:</strong><br/>
<input type="text" name="rua" value="Rua Vitória Régia" /><br/><br/>

<strong>Número:</strong><br/>
<input type="text" name="numero" value="127" /><br/><br/>

<strong>Complemento:</strong><br/>
<input type="text" name="complemento" value="Casa C" /><br/><br/>

<strong>Bairro:</strong><br/>
<input type="text" name="bairro" value="Jardim Soledade" /><br/><br/>

<strong>Cidade:</strong><br/>
<input type="text" name="cidade" value="São Pedro da Aldeia" /><br/><br/>

<strong>Estado:</strong><br/>
<input type="text" name="estado" value="RJ" /><br/><br/>

<button class="button efetuarCompra">Efetuar Compra</button>
</form>
