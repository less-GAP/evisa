
export const darkModeKey = "darkMode";

export const styleKey = "style";

export const containerMaxW = "xl:max-w-8xl xl:mx-auto";
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
export const formConfig = {
  "validateTrigger": "submit",
  "label-align": "top",
  "layout": "vertical",
  labelCol: {span: 24},
  scrollToFirstError: true,
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
}
