import{b as s,o as c,c as g,w as a,d as e,e as i,p as A,t as C,f as T,n as ae,j as te,u as x,A as F,v as le,x as ue,a3 as ne,r as _,s as S,_ as oe,F as se,g as ie,h as re,a4 as pe,a0 as de,a1 as ce,l as w,Z as me,a2 as L}from"./index.c46faa22.js";import{V as ve}from"./jodit-vue.es.442dfd41.js";import{D as _e}from"./DataTable.85d519c9.js";const fe=["src","alt"],Ee={key:0,class:"flex items-center"},he=A("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),ge={key:1,class:"flex items-center"},xe=A("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),Ae={__name:"ProductList",emits:["submit"],setup(G,{emit:f}){const y={api:h=>F.get("product/list",{params:{...h,type:"product"}}),itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:le,key:"edit",action(h,u){f("submit",h)}}],columns:[{title:"H\xECnh \u1EA3nh",key:"image"},{title:"Lo\u1EA1i s\u1EA3n ph\u1EA9m",key:"type"},{title:"T\xEAn s\u1EA3n ph\u1EA9m",key:"name"},{title:"Gi\xE1 ni\xEAm y\u1EBFt",key:"price",class:"text-right"},{title:"Gi\xE1 s\u1EA3n ph\u1EA9m",key:"price",class:"text-right"},{title:"\u0110i\u1EC3m th\u01B0\u1EDFng(Point)",key:"point",class:"text-right"},{title:"Status",key:"status"}]};return(h,u)=>{const E=s("a-button");return c(),g(x(_e),ae(te(y)),{"cellAction[edit]":a(({item:o,actionMethod:p})=>[e(E,{type:"link",outline:!0,onClick:p},{default:a(()=>[i("Ch\u1ECDn ")]),_:2},1032,["onClick"])]),"cell[image]":a(({item:o,column:p})=>[A("img",{class:"w-20 h-auto float-left rounded-full",src:o.image_url,alt:o.name},null,8,fe)]),"cell[type]":a(({item:o,column:p})=>[i(C(o.type=="product"?"S\u1EA3n ph\u1EA9m":"G\xF3i s\u1EA3n ph\u1EA9m"),1)]),"cell[name]":a(({item:o,column:p})=>[i(C(o.name),1)]),"cell[price]":a(({item:o,column:p})=>[i(C(o.price),1)]),"cell[sale_price]":a(({item:o,column:p})=>[i(C(o.sale_price),1)]),"cell[status]":a(({item:o,column:p})=>[o.status=="D"?(c(),T("div",Ee,[he,i(" T\u1EAFt ")])):(c(),T("div",ge,[xe,i(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)}}},ye={class:"clearfix"},be=A("div",{style:{"margin-top":"8px"}},"T\u1EA3i l\xEAn",-1),ke=["src","alt"],Te=ue({__name:"ProductView",setup(G){ne();const f=_(!1),y=_("1"),h=_(),u=_({}),E=_([]);_(!1);const o=_(!1);var p=S.currentRoute.value.params.id;p>0&&(f.value=!0,F.get("product/"+p).then(n=>{var t=n.data.data;u.value=t;var m={uid:"-1",name:t.image,url:t.image_url};E.value=[...E.value||[],m],f.value=!1,t.type=="package"&&(d.value=t.packages),console.log(d.value)}));const M=()=>{h.value.validate().then(()=>{u.value.type=="package"&&(u.value.packages=d.value),F.post("product",me(u.value)).then(n=>{L[n.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:n.data.message}),n.data.code==1&&S.push("/products")})}).catch(n=>{L.error({message:"Th\xF4ng b\xE1o",description:n})})},H=()=>{S.push("/products")},R=n=>(E.value=[...E.value||[],n],!1),q=n=>{},K=n=>{const t=new FormData;t.append("image",n.file),f.value=!0,F.post("product/uploadImage",t,{headers:{"Content-Type":"multipart/form-data"}}).then(m=>{m.data.url!=""&&(u.value.file=m.data,u.value.image=m.data.name),f.value=!1})},d=_([]),I=_([{title:"H\xECnh \u1EA3nh",dataIndex:"image",key:"image",class:"text-left"},{title:"T\xEAn s\u1EA3n ph\u1EA9m",dataIndex:"name",key:"name"},{title:"Gi\xE1 b\xE1n",dataIndex:"sale_price",key:"sale_price"},{title:"\u0110i\u1EC3m th\u01B0\u1EDFng",dataIndex:"point",key:"point"},{title:"Action",key:"action"}]),O=n=>{},j=()=>{o.value=!0},z=n=>{d.value.length>0?d.value.forEach((t,m)=>{t.id!=n.id&&d.value.push(n)}):d.value.push(n),o.value=!1},X=n=>{d.value.forEach((t,m)=>{t.id==n.id&&d.value.splice(m,1)})};return(n,t)=>{const m=s("a-upload"),r=s("a-form-item"),v=s("a-col"),b=s("a-select-option"),B=s("a-select"),U=s("a-input"),k=s("a-input-number"),N=s("a-textarea"),P=s("a-row"),V=s("a-tab-pane"),D=s("a-button"),Y=s("a-popconfirm"),Z=s("a-table"),J=s("a-tabs"),Q=s("a-space"),W=s("a-form"),ee=s("a-modal");return c(),T(se,null,[e(oe,null,{default:a(()=>[e(ie,null,{default:a(()=>[e(re,{icon:x(pe),title:x(p)=="0"?"Th\xEAm s\u1EA3n ph\u1EA9m":"C\u1EADp nh\u1EADt s\u1EA3n ph\u1EA9m",main:""},null,8,["icon","title"]),e(W,{layout:"vertical",ref_key:"formRef",ref:h,model:u.value,onFinish:M},{default:a(()=>[e(J,{class:"mt-2",activeKey:y.value,"onUpdate:activeKey":t[14]||(t[14]=l=>y.value=l),onChange:O},{default:a(()=>[e(V,{key:"1",tab:"Th\xF4ng tin chung"},{default:a(()=>[e(P,{gutter:20},{default:a(()=>[e(v,{span:24},{default:a(()=>[e(r,{label:"H\xECnh \u1EA3nh"},{default:a(()=>[A("div",ye,[e(m,{"file-list":E.value,"onUpdate:fileList":t[0]||(t[0]=l=>E.value=l),name:"avatar","list-type":"picture-card","before-upload":R,onChange:K,onPreview:q,"max-count":1,"show-upload-list":!0},{default:a(()=>[A("div",null,[f.value?(c(),g(x(de),{key:0})):(c(),g(x(ce),{key:1})),be])]),_:1},8,["file-list"])])]),_:1})]),_:1}),e(v,{span:12},{default:a(()=>[e(r,{label:"Lo\u1EA1i s\u1EA3n ph\u1EA9m",name:"type",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn lo\u1EA1i s\u1EA3n ph\u1EA9m!"}]},{default:a(()=>[e(B,{value:u.value.type,"onUpdate:value":t[1]||(t[1]=l=>u.value.type=l),placeholder:""},{default:a(()=>[e(b,{value:"product"},{default:a(()=>[i("S\u1EA3n ph\u1EA9m")]),_:1}),e(b,{value:"package"},{default:a(()=>[i("G\xF3i s\u1EA3n ph\u1EA9m")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1}),e(v,{span:12},{default:a(()=>[e(r,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:a(()=>[e(B,{value:u.value.status,"onUpdate:value":t[2]||(t[2]=l=>u.value.status=l),placeholder:""},{default:a(()=>[e(b,{value:"A"},{default:a(()=>[i("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),e(b,{value:"D"},{default:a(()=>[i("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1}),e(v,{span:24},{default:a(()=>[e(r,{label:"T\xEAn s\u1EA3n ph\u1EA9m",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\xEAn s\u1EA3n ph\u1EA9m!"}]},{default:a(()=>[e(U,{value:u.value.name,"onUpdate:value":t[3]||(t[3]=l=>u.value.name=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(v,{span:8},{default:a(()=>[e(r,{label:"Gi\xE1 b\xE1n",name:"sale_price",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp gi\xE1 b\xE1n s\u1EA3n ph\u1EA9m!"}]},{default:a(()=>[e(k,{value:u.value.sale_price,"onUpdate:value":t[4]||(t[4]=l=>u.value.sale_price=l),placeholder:"Nh\u1EADp..",class:"text-xs",formatter:l=>`${l}`.replace(/\B(?=(\d{3})+(?!\d))/g,","),parser:l=>l.replace(/\$\s?|(,*)/g,""),style:{width:"100%"}},null,8,["value","formatter","parser"])]),_:1})]),_:1}),e(v,{span:8},{default:a(()=>[e(r,{label:"Gi\xE1 ni\xEAm y\u1EBFt"},{default:a(()=>[e(k,{value:u.value.price,"onUpdate:value":t[5]||(t[5]=l=>u.value.price=l),placeholder:"Nh\u1EADp..",class:"text-xs",style:{width:"100%"},formatter:l=>`${l}`.replace(/\B(?=(\d{3})+(?!\d))/g,","),parser:l=>l.replace(/\$\s?|(,*)/g,"")},null,8,["value","formatter","parser"])]),_:1})]),_:1}),e(v,{span:8},{default:a(()=>[e(r,{label:"\u0110i\u1EC3m th\u01B0\u1EDFng"},{default:a(()=>[e(k,{value:u.value.point,"onUpdate:value":t[6]||(t[6]=l=>u.value.point=l),placeholder:"Nh\u1EADp..",class:"text-xs",style:{width:"100%"},formatter:l=>`${l}`.replace(/\B(?=(\d{3})+(?!\d))/g,","),parser:l=>l.replace(/\$\s?|(,*)/g,"")},null,8,["value","formatter","parser"])]),_:1})]),_:1}),e(v,{span:8},{default:a(()=>[e(r,{label:"T\u1ED3n kho"},{default:a(()=>[e(k,{value:u.value.stock,"onUpdate:value":t[7]||(t[7]=l=>u.value.stock=l),placeholder:"Nh\u1EADp..",class:"text-xs",style:{width:"100%"}},null,8,["value"])]),_:1})]),_:1}),e(v,{span:24},{default:a(()=>[e(r,{label:"M\xF4 t\u1EA3 ng\u1EAFn"},{default:a(()=>[e(N,{value:u.value.short_description,"onUpdate:value":t[8]||(t[8]=l=>u.value.short_description=l),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1}),e(r,{label:"M\xF4 t\u1EA3"},{default:a(()=>[f.value?w("",!0):(c(),g(x(ve),{key:0,style:{height:"50vh"},modelValue:u.value.description,"onUpdate:modelValue":t[9]||(t[9]=l=>u.value.description=l),config:{iframe:!0,height:"50vh"}},null,8,["modelValue"]))]),_:1})]),_:1})]),_:1})]),_:1}),u.value.type=="package"?(c(),g(V,{key:"2",tab:"S\u1EA3n ph\u1EA9m trong g\xF3i"},{default:a(()=>[e(D,{type:"primary",style:{"margin-bottom":"8px"},onClick:j,class:"float-right",ghost:""},{default:a(()=>[i("Th\xEAm")]),_:1}),d.value.length>0?(c(),g(Z,{key:0,dataSource:d.value,columns:I.value},{bodyCell:a(({column:l,record:$})=>[l.key==="image"?(c(),T("img",{key:0,class:"w-20 h-auto float-left rounded-full",src:$.image_url,alt:$.name},null,8,ke)):l.key==="action"?(c(),g(Y,{key:1,title:"B\u1EA1n mu\u1ED1n x\xF3a s\u1EA3n ph\u1EA9m ra kh\u1ECFi g\xF3i n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:De=>X($)},{default:a(()=>[e(D,{type:"text",danger:""},{default:a(()=>[i(" Xo\xE1 ")]),_:1})]),_:2},1032,["onConfirm"])):w("",!0)]),_:1},8,["dataSource","columns"])):w("",!0)]),_:1})):w("",!0),e(V,{key:"3",tab:"Th\xF4ng tin th\xEAm"},{default:a(()=>[e(P,{gutter:20},{default:a(()=>[e(v,{span:24},{default:a(()=>[e(r,{label:"Link SEO"},{default:a(()=>[e(U,{value:u.value.slug,"onUpdate:value":t[10]||(t[10]=l=>u.value.slug=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1}),e(r,{label:"Ti\xEAu \u0111\u1EC1"},{default:a(()=>[e(U,{value:u.value.title,"onUpdate:value":t[11]||(t[11]=l=>u.value.title=l),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1}),e(r,{label:"Meta description"},{default:a(()=>[e(N,{value:u.value.meta_description,"onUpdate:value":t[12]||(t[12]=l=>u.value.meta_description=l),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1}),e(r,{label:"Meta keyword"},{default:a(()=>[e(N,{value:u.value.meta_keyword,"onUpdate:value":t[13]||(t[13]=l=>u.value.meta_keyword=l),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1})]),_:1})]),_:1})]),_:1})]),_:1},8,["activeKey"]),e(Q,{align:"center"},{default:a(()=>[e(D,{type:"primary","html-type":"submit"},{default:a(()=>[i("L\u01B0u")]),_:1}),e(D,{type:"primary",ghost:"",onClick:t[15]||(t[15]=l=>H())},{default:a(()=>[i("Tr\u1EDF v\u1EC1")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1})]),_:1}),e(ee,{open:o.value,"onUpdate:open":t[16]||(t[16]=l=>o.value=l),width:"70%",title:"Danh s\xE1ch s\u1EA3n ph\u1EA9m",footer:null},{default:a(()=>[e(Ae,{onSubmit:z})]),_:1},8,["open"])],64)}}});export{Te as default};
