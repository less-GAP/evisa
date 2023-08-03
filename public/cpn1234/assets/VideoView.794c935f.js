import{x as L,a1 as P,r as i,s as g,A as x,b as n,c,w as a,_ as R,o as v,d as e,h as M,u as _,a2 as q,p as E,a3 as O,a4 as S,e as f,l as H,g as Z,Z as j,$ as b}from"./index.6dbccf15.js";import{V as z}from"./jodit-vue.es.442dfd41.js";const G={class:"clearfix"},I=E("div",{style:{"margin-top":"8px"}},"T\u1EA3i l\xEAn",-1),W=L({__name:"VideoView",setup(J){P();const r=i(!1);i("1");const A=i(),o=i({}),d=i([]);i(!1),i(!1);var h=g.currentRoute.value.params.id;h>0&&(r.value=!0,x.get("video/"+h).then(l=>{var t=l.data.data;o.value=t;var s={uid:"-1",name:t.image,url:t.image_url};d.value=[...d.value||[],s],r.value=!1}));const w=()=>{A.value.validate().then(()=>{x.post("video",j(o.value)).then(l=>{b[l.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:l.data.message}),l.data.code==1&&g.push("/videos")})}).catch(l=>{b.error({message:"Th\xF4ng b\xE1o",description:l})})},C=()=>{g.push("/videos")},D=l=>(d.value=[...d.value||[],l],!1),F=l=>{const t=new FormData;t.append("image",l.file),r.value=!0,x.post("video/uploadVideo",t,{headers:{"Content-Type":"multipart/form-data"}}).then(s=>{s.data.url!=""&&(o.value.file=s.data,o.value.path=s.data.name),r.value=!1})};return(l,t)=>{const s=n("a-upload"),p=n("a-form-item"),m=n("a-col"),V=n("a-select-option"),T=n("a-select"),k=n("a-input"),N=n("a-textarea"),U=n("a-row"),y=n("a-button"),$=n("a-space"),B=n("a-form");return v(),c(R,null,{default:a(()=>[e(Z,null,{default:a(()=>[e(M,{icon:_(q),title:_(h)=="0"?"Th\xEAm video":"C\u1EADp nh\u1EADt video",main:""},null,8,["icon","title"]),e(B,{layout:"vertical",ref_key:"formRef",ref:A,model:o.value,onFinish:w},{default:a(()=>[e(U,{gutter:20},{default:a(()=>[e(m,{span:24},{default:a(()=>[e(p,{label:"Video"},{default:a(()=>[E("div",G,[e(s,{"file-list":d.value,"onUpdate:fileList":t[0]||(t[0]=u=>d.value=u),name:"avatar","list-type":"picture-card","before-upload":D,onChange:F,onPreview:l.handlePreview,"max-count":1,"show-upload-list":!0},{default:a(()=>[E("div",null,[r.value?(v(),c(_(O),{key:0})):(v(),c(_(S),{key:1})),I])]),_:1},8,["file-list","onPreview"])])]),_:1})]),_:1}),e(m,{span:12},{default:a(()=>[e(p,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:a(()=>[e(T,{value:o.value.status,"onUpdate:value":t[1]||(t[1]=u=>o.value.status=u),placeholder:""},{default:a(()=>[e(V,{value:"A"},{default:a(()=>[f("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),e(V,{value:"D"},{default:a(()=>[f("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1}),e(m,{span:24},{default:a(()=>[e(p,{label:"T\xEAn video",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\xEAn video!"}]},{default:a(()=>[e(k,{value:o.value.name,"onUpdate:value":t[2]||(t[2]=u=>o.value.name=u),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(m,{span:24},{default:a(()=>[e(p,{label:"M\xF4 t\u1EA3 ng\u1EAFn"},{default:a(()=>[e(N,{value:o.value.short_description,"onUpdate:value":t[3]||(t[3]=u=>o.value.short_description=u),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1}),e(p,{label:"M\xF4 t\u1EA3"},{default:a(()=>[r.value?H("",!0):(v(),c(_(z),{key:0,style:{height:"50vh"},modelValue:o.value.description,"onUpdate:modelValue":t[4]||(t[4]=u=>o.value.description=u),config:{iframe:!0,height:"50vh"}},null,8,["modelValue"]))]),_:1})]),_:1})]),_:1}),e($,{align:"center"},{default:a(()=>[e(y,{type:"primary","html-type":"submit"},{default:a(()=>[f("L\u01B0u")]),_:1}),e(y,{type:"primary",ghost:"",onClick:t[5]||(t[5]=u=>C())},{default:a(()=>[f("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1})}}});export{W as default};
