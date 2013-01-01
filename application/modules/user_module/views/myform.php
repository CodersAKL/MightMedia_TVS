<div id="error">
	<?php echo validation_errors(); ?>
</div>


<?php
$aFormData = array( 'id' => 'validationForm' );
echo form_open( 'user_module/form', $aFormData );
?>

<div class="control-group">
	<label class="control-label">Vardas:</label>
	<div class="controls">
		<input type="text" name="name" id="name" class="input-xlarge"/>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Pavardė:</label>
	<div class="controls">
		<input type="text" name="surname" id="surname" class="input-xlarge"/>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Pašto dėžutė:</label>
	<div class="controls">
		<input  type="text" name="email" id="email" class="input-xlarge"/>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Slaptažodis:</label>
	<div class="controls">
		<input type="text" name="pass" id="pass" class="input-xlarge"/>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Slaptažodis:</label>
	<div class="controls">
		<input type="text" name="passconf" id="passconf" class="input-xlarge"/>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Miestas:</label>
	<div class="controls">
		<input type="text" name="city" id="city" class="input-xlarge"/>
		<span id="city_message">Съешь ещё этих мягких французских булочек да выпей же ты чаю | ą č ę ė į š ų ū ž | ā č ē ģ ī ķ ļ ņ š ū ž ō ŗ | ä õ ö š ü ž | ä ö å š ž | ä ö ß ü à é</span>
	</div>
</div>
<div class="control-group">
	<label>Nuotrauka:</label>
	<div class="controls">
		<input type="file" name="photo" id="photo"/>
	</div>
</div>

<textarea id="texta"></textarea>

<p>
	<input type="checkbox" class="checkbox" id="agree" name="agree"/>
	Sutinku gauti informacine, bei reklamine medžiaga apie vykdomas akcijas ir specialius pasiulymus
</p>

<br/>

<input type="submit" name="submit"/>
</form>

<script>
	{ignore_pre}
	$(function () {
		$("div#error").hide();

		$("#validationForm").validate({
//			errorLabelContainer : $("div#error"),
			//errorElement : "p",
			rules : {
				name : {
					required :  true,
					minlength : 5
				},
				surname : {
					required : true
				},
				email : {
					email :    true,
					required : true
				},
				pass : {
					required :  true,
					minlength : 5
				},
				passconf : {
					equalTo : "#pass"
				},
				agree : "required"
			},
			messages : {
				name : {
					required : "Prašau įveskite Jūsų vardą"
				},
				surname : {
					required : "Prašau įveskite Jūsų pavardę"
				},
				email : {
					required : "Prašau įveskite Jūsų el. pašto adresą",
					minlength : 7
				}
			},
			highlight: function(label) {
				$(label).closest('.control-group').addClass('error');
			},
			success: function(label) {
				label
						.text('OK!').addClass('valid')
						.closest('.control-group').addClass('success');
			}
		});

		jQuery.extend(jQuery.validator.messages, {
			required :    "Šis laukas yra privalomas.",
			remote :      "Prašau pataisyti šį lauką.",
			email :       "Prašau įvesti teisingą elektroninio pašto adresą.",
			url :         "Prašau įvesti teisingą URL.",
			date :        "Prašau įvesti teisingą datą.",
			dateISO :     "Prašau įvesti teisingą datą (ISO).",
			number :      "Prašau įvesti teisingą skaičių.",
			digits :      "Prašau naudoti tik skaitmenis.",
			creditcard :  "Prašau įvesti teisingą kreditinės kortelės numerį.",
			equalTo :     "Prašau įvestį tą pačią reikšmę dar kartą.",
			accept :      "Prašau įvesti reikšmę su teisingu plėtiniu.",
			maxlength :   $.format("Prašau įvesti ne daugiau kaip {0} simbolių."),
			minlength :   $.format("Prašau įvesti bent {0} simbolius."),
			rangelength : $.format("Prašau įvesti reikšmes, kurių ilgis nuo {0} iki {1} simbolių."),
			range :       $.format("Prašau įvesti reikšmę intervale nuo {0} iki {1}."),
			max :         $.format("Prašau įvesti reikšmę mažesnę arba lygią {0}."),
			min :         $.format("Prašau įvesti reikšmę didesnę arba lygią {0}.")
		});
	});
	{/ignore_pre}
</script>
