import{l as D,$ as V,p as s,f as m,A as h,r as o,v as w,w as t,_ as B,o as T,a as e,d as r,z as N,b as $,a0 as R,i as g}from"./index.e9f28c59.js";/* empty css              */import"./jodit-vue.es.9648541b.js";const z=D({__name:"Detail",setup(S){V();const p=s(!1);s("1");const i=s(),n=s({});s([]),s(!1),s(!1);var d=m.currentRoute.value.params.id;d>0&&(p.value=!0,h.get("customer-group/"+d).then(l=>{var a=l.data.data;n.value=a,p.value=!1}));const x=()=>{i.value.validate().then(()=>{h.post("customer-group",R(n.value)).then(l=>{g[l.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:l.data.message}),l.data.code==1&&m.push("/customer-group")})}).catch(l=>{g.error({message:"Th\xF4ng b\xE1o",description:l})})},E=()=>{m.push("/customer-group")};return(l,a)=>{const f=o("a-select-option"),A=o("a-select"),c=o("a-form-item"),_=o("a-col"),k=o("a-input"),y=o("a-textarea"),b=o("a-row"),v=o("a-button"),C=o("a-space"),F=o("a-form");return T(),w(B,null,{default:t(()=>[e($,null,{default:t(()=>[e(F,{layout:"vertical",ref_key:"formRef",ref:i,model:n.value,onFinish:x},{default:t(()=>[e(b,{gutter:20},{default:t(()=>[e(_,{span:12},{default:t(()=>[e(c,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:t(()=>[e(A,{value:n.value.status,"onUpdate:value":a[0]||(a[0]=u=>n.value.status=u),placeholder:""},{default:t(()=>[e(f,{value:"A"},{default:t(()=>[r("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),e(f,{value:"D"},{default:t(()=>[r("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1}),e(_,{span:24},{default:t(()=>[e(c,{label:"T\xEAn nh\xF3m kh\xE1ch h\xE0ng",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\xEAn nh\xF3m kh\xE1ch h\xE0ng!"}]},{default:t(()=>[e(k,{value:n.value.name,"onUpdate:value":a[1]||(a[1]=u=>n.value.name=u),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(_,{span:24},{default:t(()=>[e(c,{label:"M\xF4 t\u1EA3"},{default:t(()=>[e(y,{value:n.value.description,"onUpdate:value":a[2]||(a[2]=u=>n.value.description=u),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1}),N("",!0)]),_:1})]),_:1}),e(C,{align:"center"},{default:t(()=>[e(v,{type:"primary","html-type":"submit"},{default:t(()=>[r("L\u01B0u")]),_:1}),e(v,{type:"primary",ghost:"",onClick:a[4]||(a[4]=u=>E())},{default:t(()=>[r("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1})}}});export{z as default};
