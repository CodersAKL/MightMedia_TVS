<form action="POST" id="payment_block_<?php echo $aData['sCode']; ?>">

<?php foreach ($aPaymentParams['aPaymentTypes'] as $aPaymentType) {?>

	<input type="radio" name="payment_type_id" value="<?php echo $aPaymentType['iId'] ?>"><?php echo $aPaymentType['sTitle'] ?><br>
	
<?php } ?>


<div class="credit-card bg-sl p-both" id="system_block_payment_cc_box_{$p.iId}_{$aOrder.sCode}">
	<div class="one fl s16">
		<label for="sb_payment_cc_cardholder_{$aOrder.sCode}">{t}str3{/t}:
			<input type="text" class="input s16 noAutoComplete" name="cc_cardholder" id="sb_payment_cc_cardholder_{$aOrder.sCode}" />
		</label>
		<label for="sb_payment_cc_number_1_{$aOrder.sCode}">{t}str4{/t}:
			<input type="text" name="cc_number" id="sb_payment_cc_number_1_{$aOrder.sCode}" class="input s16 noAutoComplete" maxlength="16" />
		</label>
		<label for="sb_payment_cc_expdate_{$aOrder.sCode}" class="d-b">{t}str5{/t}:</label>
		<label>
			<input type="text" class="input number w70 d-i s16 noAutoComplete" name="cc_expdate_1" id="sb_payment_cc_expdate_{$aOrder.sCode}" maxlength="2" />
		</label>
		<span class="m-l5 m-r5">/</span>
		<label>
			<input type="text" class="input number w70 d-i s16" name="cc_expdate_2" id="sb_payment_cc_expdate_2_{$aOrder.sCode}" maxlength="2"/>
		</label>
	</div>
	<div class="two fr m-t50 wa s16 p-t5">
		<label for="sb_payment_cc_cvc_{$aOrder.sCode}">{t}str6{/t}: <a title="" class="help help_cvc" id="help_cvc_{$aOrder.sCode}"  href="javascript:void(0)"><img src="{$server.img}blank.gif" width="16" height="16" alt="" /></a>
			<input type="text" class="input number w70 s16 noAutoComplete" name="cc_cvc" id="sb_payment_cc_cvc_{$aOrder.sCode}"  maxlength="3" />
		</label>
	</div>
</div>



<input type="button" value="Submit" onclick="window.payment.pay('<?php echo $aData['sCode']; ?>');" value="ssssssssss">
</form>