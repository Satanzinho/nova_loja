<h1>Checkout Transparente - Pagseguro</h1>

<h3>Dados Pessoais</h3>

<strong>Nome:</strong><br/>
<input type="text" name="name" value="Jorge Luiz Valente" /><br/><br/>

<strong>CPF:</strong><br/>
<input type="text" name="cpf" value="13085251766" /><br/><br/>

<strong>Telefone:</strong><br/>
<input type="text" name="telefone" value="22992914959" /><br/><br/>

<strong>E-mail:</strong><br/>
<input type="email" name="email" value="c74848281451521297711@sandbox.pagseguro.com.br" /><br/><br/>

<strong>Senha:</strong><br/>
<input type="password" name="password" value="p6563775W97v7D17" /><br/><br/>

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

<h3>Informações de Pagamento</h3>

<strong>Titular do cartão:</strong><br/>
<input type="text" name="cartao_titular" value="Jorge Luiz Valente" /><br/><br/>

<strong>CPF do Titular do cartão:</strong><br/>
<input type="text" name="cartao_cpf" value="13085251766" /><br/><br/>

<strong>Número do cartão:</strong><br/>
<input type="text" name="cartao_numero" /><br/><br/>

<strong>Código de Segurança:</strong><br/>
<input type="text" name="cartao_cvv" value="123" /><br/><br/>

<strong>Validade:</strong><br/>
<select name="cartao_mes">
	<?php for($q=1;$q<=12;$q++): ?>
	<option><?php echo ($q<10)?'0'.$q:$q; ?></option>
	<?php endfor; ?>
</select>
<select name="cartao_ano">
	<?php $ano = intval(date('Y')); ?>
	<?php for($q=$ano;$q<=($ano+20);$q++): ?>
	<option><?php echo $q; ?></option>
	<?php endfor; ?>
</select><br/><br/>

<strong>Parcelas:</strong><br/>
<select name="parc"></select><br/><br/>

<input type="hidden" name="total" value="<?php echo $total; ?>" />

<button class="button efetuarCompra">Efetuar Compra</button>










<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/psckttransparente.js"></script>
<script type="text/javascript">
PagSeguroDirectPayment.setSessionId("<?php echo $sessionCode; ?>");
</script>