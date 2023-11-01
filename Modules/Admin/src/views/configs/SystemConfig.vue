<script setup>
import { reactive, ref } from "vue";
import { message } from 'ant-design-vue';

import Api from "@/utils/Api";
import validateMessages from "@/utils/validateMessages";

// export default {
//   components: {}
// }


const configNames = [
	'system_filemanager',
]

const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const formState = reactive({});
const formConfig = reactive({
	"validateTrigger": "submit",
	"label-align": "top",
	"model": formState,
	labelCol: { span: 24 },
	wrapperCol: { span: 24 },
	"validate-messages": validateMessages,
});
const fetch = function () {
	loading.value = true
	Api.get('config', { params: { names: configNames } }).then(result => {
		Object.assign(formState, result.data)
	}).catch(e => {
	}).finally(loading.value = false)
}
fetch();
const submit = async function () {
	loading.value = true
	Api.post('config', formState).then(result => {
		emit('success', result)
	}).catch(e => {
	}).finally(loading.value = false)
}

const cancel = function () {
	emit('cancel')
}

</script>

<template>
	<a-form autocomplete="off" v-bind="formConfig" @finish="submit">
		<a-form-item name="system_filemanager" label="File upload extensions">
			<a-textarea autocomplete="off" v-model:value="formState.system_filemanager" class="rounded border-gray-300"
				placeholder="png, jpg" />
		</a-form-item>
		<a-form-item>
			<a-space>
				<a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
			</a-space>
		</a-form-item>
	</a-form>
</template>
