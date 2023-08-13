<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import {message} from 'ant-design-vue';
import {InputUploadGetPath} from "@/components";

const props = defineProps({
  value: Object
})

const validateMessages = {
  required: '${label} is required!',
  types: {
    email: '${label} is not a valid email!',
    number: '${label} is not a valid number!',
  },
  number: {
    range: '${label} must be between ${min} and ${max}',
  },
};

const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const formState = reactive(props.value || {
  isNew: true,
  full_name: "",
  username: "",
  email: "",
  role: "user",
  password: "",
});

const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: {span: 24},
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
});
const submit = async function () {
  loading.value = true
  Api.post('user', formState).then(result => {
    emit('success', result)
  }).catch(e => {
  }).finally(loading.value = false)
}
const cancel = function () {
  emit('cancel')
}


</script>

<template>

  <a-form-item  class="w-1/2 inline-flex"  label="Photo (4x6cm, white background)"
               :rules="[{ required: true }]">
    <InputUploadGetPath placeholder="photo.jpg" width="153px" height="230px"
                 v-model:value="value.profile_photo"></InputUploadGetPath>
  </a-form-item>
  <a-form-item class="w-1/2  inline-flex" label="Passport scan" :rules="[{ required: true }]">
    <InputUploadGetPath placeholder="passport.jpg" width="346px" height="230px"
                 v-model:value="value.passport_photo"></InputUploadGetPath>
  </a-form-item>
  <a-form-item label="Full name as in passport" :rules="[{ required: true }]">
    <a-input v-model:value="value.full_name"/>
  </a-form-item>
  <a-form-item  label="Nationality" :rules="[{ required: true }]">
    <a-select show-search v-model:value="value.nationality">
      <a-select-option value="afghan">Afghan</a-select-option>
      <a-select-option value="albanian">Albanian</a-select-option>
      <a-select-option value="algerian">Algerian</a-select-option>
      <a-select-option value="american">American</a-select-option>
      <a-select-option value="andorran">Andorran</a-select-option>
      <a-select-option value="angolan">Angolan</a-select-option>
      <a-select-option value="antiguans">Antiguans</a-select-option>
      <a-select-option value="argentinean">Argentinean</a-select-option>
      <a-select-option value="armenian">Armenian</a-select-option>
      <a-select-option value="australian">Australian</a-select-option>
      <a-select-option value="austrian">Austrian</a-select-option>
      <a-select-option value="azerbaijani">Azerbaijani</a-select-option>
      <a-select-option value="bahamian">Bahamian</a-select-option>
      <a-select-option value="bahraini">Bahraini</a-select-option>
      <a-select-option value="bangladeshi">Bangladeshi</a-select-option>
      <a-select-option value="barbadian">Barbadian</a-select-option>
      <a-select-option value="barbudans">Barbudans</a-select-option>
      <a-select-option value="batswana">Batswana</a-select-option>
      <a-select-option value="belarusian">Belarusian</a-select-option>
      <a-select-option value="belgian">Belgian</a-select-option>
      <a-select-option value="belizean">Belizean</a-select-option>
      <a-select-option value="beninese">Beninese</a-select-option>
      <a-select-option value="bhutanese">Bhutanese</a-select-option>
      <a-select-option value="bolivian">Bolivian</a-select-option>
      <a-select-option value="bosnian">Bosnian</a-select-option>
      <a-select-option value="brazilian">Brazilian</a-select-option>
      <a-select-option value="british">British</a-select-option>
      <a-select-option value="bruneian">Bruneian</a-select-option>
      <a-select-option value="bulgarian">Bulgarian</a-select-option>
      <a-select-option value="burkinabe">Burkinabe</a-select-option>
      <a-select-option value="burmese">Burmese</a-select-option>
      <a-select-option value="burundian">Burundian</a-select-option>
      <a-select-option value="cambodian">Cambodian</a-select-option>
      <a-select-option value="cameroonian">Cameroonian</a-select-option>
      <a-select-option value="canadian">Canadian</a-select-option>
      <a-select-option value="cape verdean">Cape Verdean</a-select-option>
      <a-select-option value="central african">Central African</a-select-option>
      <a-select-option value="chadian">Chadian</a-select-option>
      <a-select-option value="chilean">Chilean</a-select-option>
      <a-select-option value="chinese">Chinese</a-select-option>
      <a-select-option value="colombian">Colombian</a-select-option>
      <a-select-option value="comoran">Comoran</a-select-option>
      <a-select-option value="congolese">Congolese</a-select-option>
      <a-select-option value="costa rican">Costa Rican</a-select-option>
      <a-select-option value="croatian">Croatian</a-select-option>
      <a-select-option value="cuban">Cuban</a-select-option>
      <a-select-option value="cypriot">Cypriot</a-select-option>
      <a-select-option value="czech">Czech</a-select-option>
      <a-select-option value="danish">Danish</a-select-option>
      <a-select-option value="djibouti">Djibouti</a-select-option>
      <a-select-option value="dominican">Dominican</a-select-option>
      <a-select-option value="dutch">Dutch</a-select-option>
      <a-select-option value="east timorese">East Timorese</a-select-option>
      <a-select-option value="ecuadorean">Ecuadorean</a-select-option>
      <a-select-option value="egyptian">Egyptian</a-select-option>
      <a-select-option value="emirian">Emirian</a-select-option>
      <a-select-option value="equatorial guinean">Equatorial Guinean</a-select-option>
      <a-select-option value="eritrean">Eritrean</a-select-option>
      <a-select-option value="estonian">Estonian</a-select-option>
      <a-select-option value="ethiopian">Ethiopian</a-select-option>
      <a-select-option value="fijian">Fijian</a-select-option>
      <a-select-option value="filipino">Filipino</a-select-option>
      <a-select-option value="finnish">Finnish</a-select-option>
      <a-select-option value="french">French</a-select-option>
      <a-select-option value="gabonese">Gabonese</a-select-option>
      <a-select-option value="gambian">Gambian</a-select-option>
      <a-select-option value="georgian">Georgian</a-select-option>
      <a-select-option value="german">German</a-select-option>
      <a-select-option value="ghanaian">Ghanaian</a-select-option>
      <a-select-option value="greek">Greek</a-select-option>
      <a-select-option value="grenadian">Grenadian</a-select-option>
      <a-select-option value="guatemalan">Guatemalan</a-select-option>
      <a-select-option value="guinea-bissauan">Guinea-Bissauan</a-select-option>
      <a-select-option value="guinean">Guinean</a-select-option>
      <a-select-option value="guyanese">Guyanese</a-select-option>
      <a-select-option value="haitian">Haitian</a-select-option>
      <a-select-option value="herzegovinian">Herzegovinian</a-select-option>
      <a-select-option value="honduran">Honduran</a-select-option>
      <a-select-option value="hungarian">Hungarian</a-select-option>
      <a-select-option value="icelander">Icelander</a-select-option>
      <a-select-option value="indian">Indian</a-select-option>
      <a-select-option value="indonesian">Indonesian</a-select-option>
      <a-select-option value="iranian">Iranian</a-select-option>
      <a-select-option value="iraqi">Iraqi</a-select-option>
      <a-select-option value="irish">Irish</a-select-option>
      <a-select-option value="israeli">Israeli</a-select-option>
      <a-select-option value="italian">Italian</a-select-option>
      <a-select-option value="ivorian">Ivorian</a-select-option>
      <a-select-option value="jamaican">Jamaican</a-select-option>
      <a-select-option value="japanese">Japanese</a-select-option>
      <a-select-option value="jordanian">Jordanian</a-select-option>
      <a-select-option value="kazakhstani">Kazakhstani</a-select-option>
      <a-select-option value="kenyan">Kenyan</a-select-option>
      <a-select-option value="kittian and nevisian">Kittian and Nevisian</a-select-option>
      <a-select-option value="kuwaiti">Kuwaiti</a-select-option>
      <a-select-option value="kyrgyz">Kyrgyz</a-select-option>
      <a-select-option value="laotian">Laotian</a-select-option>
      <a-select-option value="latvian">Latvian</a-select-option>
      <a-select-option value="lebanese">Lebanese</a-select-option>
      <a-select-option value="liberian">Liberian</a-select-option>
      <a-select-option value="libyan">Libyan</a-select-option>
      <a-select-option value="liechtensteiner">Liechtensteiner</a-select-option>
      <a-select-option value="lithuanian">Lithuanian</a-select-option>
      <a-select-option value="luxembourger">Luxembourger</a-select-option>
      <a-select-option value="macedonian">Macedonian</a-select-option>
      <a-select-option value="malagasy">Malagasy</a-select-option>
      <a-select-option value="malawian">Malawian</a-select-option>
      <a-select-option value="malaysian">Malaysian</a-select-option>
      <a-select-option value="maldivan">Maldivan</a-select-option>
      <a-select-option value="malian">Malian</a-select-option>
      <a-select-option value="maltese">Maltese</a-select-option>
      <a-select-option value="marshallese">Marshallese</a-select-option>
      <a-select-option value="mauritanian">Mauritanian</a-select-option>
      <a-select-option value="mauritian">Mauritian</a-select-option>
      <a-select-option value="mexican">Mexican</a-select-option>
      <a-select-option value="micronesian">Micronesian</a-select-option>
      <a-select-option value="moldovan">Moldovan</a-select-option>
      <a-select-option value="monacan">Monacan</a-select-option>
      <a-select-option value="mongolian">Mongolian</a-select-option>
      <a-select-option value="moroccan">Moroccan</a-select-option>
      <a-select-option value="mosotho">Mosotho</a-select-option>
      <a-select-option value="motswana">Motswana</a-select-option>
      <a-select-option value="mozambican">Mozambican</a-select-option>
      <a-select-option value="namibian">Namibian</a-select-option>
      <a-select-option value="nauruan">Nauruan</a-select-option>
      <a-select-option value="nepalese">Nepalese</a-select-option>
      <a-select-option value="new zealander">New Zealander</a-select-option>
      <a-select-option value="ni-vanuatu">Ni-Vanuatu</a-select-option>
      <a-select-option value="nicaraguan">Nicaraguan</a-select-option>
      <a-select-option value="nigerien">Nigerien</a-select-option>
      <a-select-option value="north korean">North Korean</a-select-option>
      <a-select-option value="northern irish">Northern Irish</a-select-option>
      <a-select-option value="norwegian">Norwegian</a-select-option>
      <a-select-option value="omani">Omani</a-select-option>
      <a-select-option value="pakistani">Pakistani</a-select-option>
      <a-select-option value="palauan">Palauan</a-select-option>
      <a-select-option value="panamanian">Panamanian</a-select-option>
      <a-select-option value="papua new guinean">Papua New Guinean</a-select-option>
      <a-select-option value="paraguayan">Paraguayan</a-select-option>
      <a-select-option value="peruvian">Peruvian</a-select-option>
      <a-select-option value="polish">Polish</a-select-option>
      <a-select-option value="portuguese">Portuguese</a-select-option>
      <a-select-option value="qatari">Qatari</a-select-option>
      <a-select-option value="romanian">Romanian</a-select-option>
      <a-select-option value="russian">Russian</a-select-option>
      <a-select-option value="rwandan">Rwandan</a-select-option>
      <a-select-option value="saint lucian">Saint Lucian</a-select-option>
      <a-select-option value="salvadoran">Salvadoran</a-select-option>
      <a-select-option value="samoan">Samoan</a-select-option>
      <a-select-option value="san marinese">San Marinese</a-select-option>
      <a-select-option value="sao tomean">Sao Tomean</a-select-option>
      <a-select-option value="saudi">Saudi</a-select-option>
      <a-select-option value="scottish">Scottish</a-select-option>
      <a-select-option value="senegalese">Senegalese</a-select-option>
      <a-select-option value="serbian">Serbian</a-select-option>
      <a-select-option value="seychellois">Seychellois</a-select-option>
      <a-select-option value="sierra leonean">Sierra Leonean</a-select-option>
      <a-select-option value="singaporean">Singaporean</a-select-option>
      <a-select-option value="slovakian">Slovakian</a-select-option>
      <a-select-option value="slovenian">Slovenian</a-select-option>
      <a-select-option value="solomon islander">Solomon Islander</a-select-option>
      <a-select-option value="somali">Somali</a-select-option>
      <a-select-option value="south african">South African</a-select-option>
      <a-select-option value="south korean">South Korean</a-select-option>
      <a-select-option value="spanish">Spanish</a-select-option>
      <a-select-option value="sri lankan">Sri Lankan</a-select-option>
      <a-select-option value="sudanese">Sudanese</a-select-option>
      <a-select-option value="surinamer">Surinamer</a-select-option>
      <a-select-option value="swazi">Swazi</a-select-option>
      <a-select-option value="swedish">Swedish</a-select-option>
      <a-select-option value="swiss">Swiss</a-select-option>
      <a-select-option value="syrian">Syrian</a-select-option>
      <a-select-option value="taiwanese">Taiwanese</a-select-option>
      <a-select-option value="tajik">Tajik</a-select-option>
      <a-select-option value="tanzanian">Tanzanian</a-select-option>
      <a-select-option value="thai">Thai</a-select-option>
      <a-select-option value="togolese">Togolese</a-select-option>
      <a-select-option value="tongan">Tongan</a-select-option>
      <a-select-option value="trinidadian or tobagonian">Trinidadian or Tobagonian</a-select-option>
      <a-select-option value="tunisian">Tunisian</a-select-option>
      <a-select-option value="turkish">Turkish</a-select-option>
      <a-select-option value="tuvaluan">Tuvaluan</a-select-option>
      <a-select-option value="ugandan">Ugandan</a-select-option>
      <a-select-option value="ukrainian">Ukrainian</a-select-option>
      <a-select-option value="uruguayan">Uruguayan</a-select-option>
      <a-select-option value="uzbekistani">Uzbekistani</a-select-option>
      <a-select-option value="venezuelan">Venezuelan</a-select-option>
      <a-select-option value="vietnamese">Vietnamese</a-select-option>
      <a-select-option value="welsh">Welsh</a-select-option>
      <a-select-option value="yemenite">Yemenite</a-select-option>
      <a-select-option value="zambian">Zambian</a-select-option>
      <a-select-option value="zimbabwean">Zimbabwean</a-select-option>
    </a-select>
  </a-form-item>
  <a-form-item label="Passport number" :rules="[{ required: true }]">
    <a-input v-model:value="value.passport_number"/>
  </a-form-item>
  <a-form-item  label="Email" :rules="[{ required: true }]">
    <a-input v-model:value="value.email"/>
  </a-form-item>


</template>
