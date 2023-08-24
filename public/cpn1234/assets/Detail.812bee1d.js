import{r as u,o as c,v as N,w as t,a as e,d as s,e as O,t as E,c as k,n as ae,g as le,u as j,A as K,m as ne,p as _,P as oe,z as g,F as D,i as z,l as ue,a2 as se,_ as ie,f as L,b as re,V as pe}from"./index.8eebe5f8.js";import"./InputUploadGetPath.vue_vue_type_script_lang.92d5db45.js";import{I as J}from"./InputUploadGetPath.bd0e6dc2.js";/* empty css              */import{V as de}from"./jodit-vue.es.9648541b.js";import{D as me}from"./DataTable.d81a08d5.js";const ce=["src","alt"],fe={key:0,class:"flex items-center"},ve=O("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),_e={key:1,class:"flex items-center"},ge=O("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),Q={__name:"ProductList",emits:["submit"],setup(H,{emit:b}){const x={api:h=>K.get("product/list",{params:{...h,type:"product"}}),itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:ne,key:"edit",action(h,a){b("submit",h)}}],columns:[{title:"H\xECnh \u1EA3nh",key:"image"},{title:"Lo\u1EA1i s\u1EA3n ph\u1EA9m",key:"type"},{title:"T\xEAn s\u1EA3n ph\u1EA9m",key:"name"},{title:"Gi\xE1 ni\xEAm y\u1EBFt",key:"price",align:"right"},{title:"Gi\xE1 s\u1EA3n ph\u1EA9m",key:"price",align:"right"},{title:"\u0110i\u1EC3m th\u01B0\u1EDFng(Point)",key:"point",align:"right"},{title:"T\xECnh tr\u1EA1ng",key:"status"}]};return(h,a)=>{const d=u("a-button");return c(),N(j(me),ae(le(x)),{"cellAction[edit]":t(({item:p,actionMethod:f})=>[e(d,{type:"link",outline:!0,onClick:f},{default:t(()=>[s("Ch\u1ECDn ")]),_:2},1032,["onClick"])]),"cell[image]":t(({item:p,column:f})=>[O("img",{class:"w-20 h-auto float-left rounded-full",src:p.image_url,alt:p.name},null,8,ce)]),"cell[type]":t(({item:p,column:f})=>[s(E(p.type=="product"?"S\u1EA3n ph\u1EA9m":"G\xF3i s\u1EA3n ph\u1EA9m"),1)]),"cell[name]":t(({item:p,column:f})=>[s(E(p.name),1)]),"cell[price]":t(({item:p,column:f})=>[s(E(h.$format.formatMoney(p.price)),1)]),"cell[sale_price]":t(({item:p,column:f})=>[s(E(h.$format.formatMoney(p.sale_price)),1)]),"cell[point]":t(({item:p,column:f})=>[s(E(h.$format.formatNumber(p.point)),1)]),"cell[status]":t(({item:p,column:f})=>[p.status=="D"?(c(),k("div",fe,[ve,s(" T\u1EAFt ")])):(c(),k("div",_e,[ge,s(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)}}},he=["src","alt"],ye={__name:"Course",props:{value:Object},emits:["submit","close"],setup(H,{emit:b}){const x=H,h=_(),a=_({}),d=_([]),p=_(!1);a.value=x.value,x.value.products&&(d.value=x.value.products);const f=()=>{b("close")},B=()=>{p.value=!0},X=_([{title:"H\xECnh \u1EA3nh",dataIndex:"image",key:"image",align:"left"},{title:"T\xEAn s\u1EA3n ph\u1EA9m",dataIndex:"name",key:"name",align:"left"},{title:"Gi\xE1 ni\xEAm y\u1EBFt",dataIndex:"price",key:"price",align:"right"},{title:"Gi\xE1 b\xE1n",dataIndex:"sale_price",key:"sale_price",align:"right"},{title:"\u0110i\u1EC3m th\u01B0\u1EDFng",dataIndex:"point",key:"point",align:"right"},{title:"H\xE0nh \u0111\u1ED9ng",key:"action"}]),P=v=>{var i=!1;d.value.length>0?d.value.forEach(y=>{parseInt(y.id)==parseInt(v.id)&&(i=!0)}):i=!1,i==!1&&d.value.push(v),p.value=!1},G=v=>{d.value.forEach((i,y)=>{parseInt(i.id)==parseInt(v.id)&&d.value.splice(y,1)})},q=()=>{h.value.validate().then(()=>{a.value.packages=d.value,b("submit",a.value)}).catch(v=>{console.log(v),z.error({message:"Th\xF4ng b\xE1o",description:v})})};return oe(()=>x.value,async()=>{a.value=x.value,d.value=x.value.products}),(v,i)=>{const y=u("a-form-item"),A=u("a-col"),r=u("a-input"),l=u("a-input-number"),m=u("a-textarea"),C=u("a-row"),T=u("a-tab-pane"),w=u("a-button"),M=u("a-popconfirm"),S=u("a-table"),V=u("a-tabs"),I=u("a-space"),U=u("a-form"),R=u("a-modal");return c(),k(D,null,[a.value?(c(),N(U,{key:0,layout:"vertical",ref_key:"formRef",ref:h,model:a.value,onFinish:q},{default:t(()=>[e(V,{class:"mt-2"},{default:t(()=>[e(T,{key:"1",tab:"Th\xF4ng tin chung"},{default:t(()=>[e(C,{gutter:20},{default:t(()=>[e(A,{span:24},{default:t(()=>[e(y,{style:{width:"100%"},label:"H\xECnh \u0111\u1EA1i di\u1EC7n"},{default:t(()=>[e(J,{width:"200px",autocomplete:"off",value:a.value.image,"onUpdate:value":i[0]||(i[0]=o=>a.value.image=o)},null,8,["value"])]),_:1})]),_:1}),e(A,{span:24},{default:t(()=>[e(y,{label:"T\xEAn l\u1ED9 tr\xECnh",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\xEAn l\u1ED9 tr\xECnh!"}]},{default:t(()=>[e(r,{value:a.value.name,"onUpdate:value":i[1]||(i[1]=o=>a.value.name=o),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(A,{span:24},{default:t(()=>[e(y,{label:"Th\u1EDDi gian",name:"time",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp th\u1EDDi gian!"}]},{default:t(()=>[e(r,{value:a.value.time,"onUpdate:value":i[2]||(i[2]=o=>a.value.time=o),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(A,{span:8},{default:t(()=>[e(y,{label:"Gi\xE1 b\xE1n",name:"price",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp gi\xE1 b\xE1n s\u1EA3n ph\u1EA9m!"}]},{default:t(()=>[e(l,{value:a.value.price,"onUpdate:value":i[3]||(i[3]=o=>a.value.price=o),placeholder:"Nh\u1EADp..",class:"text-xs",style:{width:"100%"},formatter:o=>`${o}`.replace(/\B(?=(\d{3})+(?!\d))/g,","),parser:o=>o.replace(/\$\s?|(,*)/g,"")},null,8,["value","formatter","parser"])]),_:1})]),_:1}),e(A,{span:8},{default:t(()=>[e(y,{label:"\u0110i\u1EC3m th\u01B0\u1EDFng"},{default:t(()=>[e(l,{value:a.value.point,"onUpdate:value":i[4]||(i[4]=o=>a.value.point=o),placeholder:"Nh\u1EADp..",class:"text-xs",style:{width:"100%"},formatter:o=>`${o}`.replace(/\B(?=(\d{3})+(?!\d))/g,","),parser:o=>o.replace(/\$\s?|(,*)/g,"")},null,8,["value","formatter","parser"])]),_:1})]),_:1}),e(A,{span:8},{default:t(()=>[e(y,{label:"T\u1ED3n kho"},{default:t(()=>[e(l,{value:a.value.stock,"onUpdate:value":i[5]||(i[5]=o=>a.value.stock=o),placeholder:"Nh\u1EADp..",class:"text-xs",style:{width:"100%"},formatter:o=>`${o}`.replace(/\B(?=(\d{3})+(?!\d))/g,","),parser:o=>o.replace(/\$\s?|(,*)/g,"")},null,8,["value","formatter","parser"])]),_:1})]),_:1}),e(A,{span:24},{default:t(()=>[e(y,{label:"M\xF4 t\u1EA3 ng\u1EAFn"},{default:t(()=>[e(m,{value:a.value.short_description,"onUpdate:value":i[6]||(i[6]=o=>a.value.short_description=o),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1})]),_:1})]),_:1})]),_:1}),e(T,{key:"2",tab:"S\u1EA3n ph\u1EA9m trong l\u1ED9 tr\xECnh"},{default:t(()=>[e(w,{type:"primary",style:{"margin-bottom":"8px"},onClick:B,class:"float-right",ghost:""},{default:t(()=>[s("Th\xEAm")]),_:1}),d.value.length>0?(c(),N(S,{key:0,dataSource:d.value,columns:X.value,pagination:!1},{bodyCell:t(({column:o,record:$})=>[o.key==="image"?(c(),k("img",{key:0,class:"w-20 h-auto float-left rounded-full",src:$.image_url,alt:$.name},null,8,he)):g("",!0),o.key==="price"?(c(),k(D,{key:1},[s(E(v.$format.formatMoney($.price)),1)],64)):g("",!0),o.key==="sale_price"?(c(),k(D,{key:2},[s(E(v.$format.formatMoney($.sale_price)),1)],64)):g("",!0),o.key==="point"?(c(),k(D,{key:3},[s(E(v.$format.formatNumber($.point)),1)],64)):o.key==="action"?(c(),N(M,{key:4,title:"B\u1EA1n mu\u1ED1n x\xF3a s\u1EA3n ph\u1EA9m ra kh\u1ECFi g\xF3i n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:Y=>G($)},{default:t(()=>[e(w,{type:"text",danger:""},{default:t(()=>[s(" Xo\xE1 ")]),_:1})]),_:2},1032,["onConfirm"])):g("",!0)]),_:1},8,["dataSource","columns"])):g("",!0)]),_:1})]),_:1}),e(I,{align:"center",loading:v.loading,class:"mt-5"},{default:t(()=>[e(w,{type:"primary","html-type":"submit"},{default:t(()=>[s("L\u01B0u")]),_:1}),e(w,{type:"primary",ghost:"",onClick:f},{default:t(()=>[s("Tr\u1EDF v\u1EC1")]),_:1})]),_:1},8,["loading"])]),_:1},8,["model"])):g("",!0),e(R,{open:p.value,"onUpdate:open":i[7]||(i[7]=o=>p.value=o),width:"70%",title:"Danh s\xE1ch s\u1EA3n ph\u1EA9m",footer:null},{default:t(()=>[e(Q,{onSubmit:P})]),_:1},8,["open"])],64)}}},ke=["src","alt"],De=ue({__name:"Detail",setup(H){se();const b=_(!1),x=_("1"),h=_(),a=_({type:"package"});_([]);const d=_([]),p=_(!1),f=_(!1),B=_({});(function(){b.value=!0;var r=L.currentRoute.value.params.id;r>0?K.get("package/"+r).then(l=>{var m=l.data.data;a.value=m,m.packages&&(d.value=m.packages),b.value=!1}):b.value=!1})();const P=()=>{h.value.validate().then(()=>{a.value.packages=d.value,K.post("package",pe(a.value)).then(r=>{z[r.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:r.data.message}),r.data.code==1&&L.push("/packages")})}).catch(r=>{z.error({message:"Th\xF4ng b\xE1o",description:r})})},G=()=>{L.push("/packages")},q=_([{title:"H\xECnh \u1EA3nh",dataIndex:"image",key:"image",align:"left"},{title:"T\xEAn l\u1ED9 tr\xECnh",dataIndex:"name",key:"name",align:"left"},{title:"Gi\xE1 b\xE1n",dataIndex:"price",key:"price",align:"right"},{title:"\u0110i\u1EC3m th\u01B0\u1EDFng",dataIndex:"point",key:"point",align:"right"},{title:"M\xF4 t\u1EA3",dataIndex:"short_description",key:"short_description",align:"left",width:"300px"},{title:"H\xE0nh \u0111\u1ED9ng",key:"action"}]),v=r=>{B.value=r,f.value=!0},i=r=>{var l=!1;d.value.length>0?d.value.forEach(m=>{parseInt(m.id)==parseInt(r.id)&&(l=!0)}):l=!1,l==!1&&d.value.push(r),f.value=!1},y=r=>{d.value.forEach((l,m)=>{l.id==r.id&&d.value.splice(m,1)})},A=()=>{f.value=!1};return(r,l)=>{const m=u("a-form-item"),C=u("a-col"),T=u("a-input"),w=u("a-select-option"),M=u("a-select"),S=u("a-textarea"),V=u("a-row"),I=u("a-tab-pane"),U=u("a-button"),R=u("a-popconfirm"),o=u("a-table"),$=u("a-tabs"),Y=u("a-space"),W=u("a-form"),Z=u("a-modal"),ee=u("a-drawer");return c(),k(D,null,[e(ie,null,{default:t(()=>[e(re,null,{default:t(()=>[a.value?(c(),N(W,{key:0,layout:"vertical",ref_key:"formRef",ref:h,model:a.value,onFinish:P},{default:t(()=>[e($,{class:"mt-2",activeKey:x.value,"onUpdate:activeKey":l[13]||(l[13]=n=>x.value=n),onChange:r.tabActive},{default:t(()=>[e(I,{key:"1",tab:"Th\xF4ng tin chung"},{default:t(()=>[e(V,{gutter:20},{default:t(()=>[e(C,{span:24},{default:t(()=>[e(m,{style:{width:"100%"},label:"H\xECnh \u0111\u1EA1i di\u1EC7n"},{default:t(()=>[e(J,{width:"200px",autocomplete:"off",value:a.value.image,"onUpdate:value":l[0]||(l[0]=n=>a.value.image=n)},null,8,["value"])]),_:1}),g("",!0)]),_:1}),e(C,{span:24},{default:t(()=>[e(m,{label:"T\xEAn g\xF3i s\u1EA3n ph\u1EA9m",name:"name",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp t\xEAn g\xF3i s\u1EA3n ph\u1EA9m!"}]},{default:t(()=>[e(T,{value:a.value.name,"onUpdate:value":l[2]||(l[2]=n=>a.value.name=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(C,{span:8},{default:t(()=>[e(m,{label:"T\xECnh tr\u1EA1ng",name:"status",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn t\xECnh tr\u1EA1ng!"}]},{default:t(()=>[e(M,{value:a.value.status,"onUpdate:value":l[3]||(l[3]=n=>a.value.status=n),placeholder:""},{default:t(()=>[e(w,{value:"A"},{default:t(()=>[s("Ho\u1EA1t \u0111\u1ED9ng")]),_:1}),e(w,{value:"D"},{default:t(()=>[s("T\u1EAFt")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1}),e(C,{span:8},{default:t(()=>[e(m,{label:"V\u1ECB tr\xED trang ch\u1EE7",name:"position",rules:[{required:!0,message:"Vui l\xF2ng ch\u1ECDn v\u1ECB tr\xED!"}]},{default:t(()=>[e(M,{value:a.value.position,"onUpdate:value":l[4]||(l[4]=n=>a.value.position=n),placeholder:""},{default:t(()=>[e(w,{value:"left"},{default:t(()=>[s("Tr\xE1i")]),_:1}),e(w,{value:"right"},{default:t(()=>[s("Ph\u1EA3i")]),_:1})]),_:1},8,["value"])]),_:1})]),_:1}),e(C,{span:8},{default:t(()=>[e(m,{label:"M\xE0u n\u1EC1n",name:"background",rules:[{required:!0,message:"Vui l\xF2ng nh\u1EADp m\xE0u n\u1EC1n!"}]},{default:t(()=>[e(T,{value:a.value.background,"onUpdate:value":l[5]||(l[5]=n=>a.value.background=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1})]),_:1}),e(C,{span:24},{default:t(()=>[e(m,{label:"M\xF4 t\u1EA3 ng\u1EAFn"},{default:t(()=>[e(S,{value:a.value.short_description,"onUpdate:value":l[6]||(l[6]=n=>a.value.short_description=n),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1}),e(m,{label:"M\xF4 t\u1EA3"},{default:t(()=>[b.value?g("",!0):(c(),N(j(de),{key:0,style:{height:"50vh"},modelValue:a.value.description,"onUpdate:modelValue":l[7]||(l[7]=n=>a.value.description=n),config:{iframe:!0,height:"50vh"}},null,8,["modelValue"]))]),_:1})]),_:1})]),_:1})]),_:1}),e(I,{key:"2",tab:"L\u1ED9 tr\xECnh"},{default:t(()=>[e(V,{gutter:20},{default:t(()=>[e(C,{span:24},{default:t(()=>[e(U,{type:"primary",style:{"margin-bottom":"8px"},onClick:l[8]||(l[8]=n=>v({})),class:"float-right",ghost:""},{default:t(()=>[s("Th\xEAm")]),_:1}),d.value.length>0?(c(),N(o,{key:0,dataSource:d.value,columns:q.value,pagination:!1,style:{width:"100%"}},{bodyCell:t(({column:n,record:F})=>[n.key==="image"?(c(),k("img",{key:0,class:"w-20 h-auto float-left rounded-full",src:F.image_url,alt:F.name},null,8,ke)):g("",!0),n.key==="price"?(c(),k(D,{key:1},[s(E(r.$format.formatMoney(F.price)),1)],64)):g("",!0),n.key==="sale_price"?(c(),k(D,{key:2},[s(E(r.$format.formatMoney(F.sale_price)),1)],64)):g("",!0),n.key==="point"?(c(),k(D,{key:3},[s(E(r.$format.formatNumber(F.point)),1)],64)):n.key==="action"?(c(),k(D,{key:4},[e(U,{type:"link",onClick:te=>v(F)},{default:t(()=>[s(" C\u1EADp nh\u1EADt ")]),_:2},1032,["onClick"]),e(R,{title:"B\u1EA1n mu\u1ED1n x\xF3a l\u1ED9 tr\xECnh n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:te=>y(F)},{default:t(()=>[e(U,{type:"text",danger:""},{default:t(()=>[s(" Xo\xE1 ")]),_:1})]),_:2},1032,["onConfirm"])],64)):g("",!0)]),_:1},8,["dataSource","columns"])):g("",!0)]),_:1})]),_:1})]),_:1}),e(I,{key:"3",tab:"Th\xF4ng tin th\xEAm"},{default:t(()=>[e(V,{gutter:20},{default:t(()=>[e(C,{span:24},{default:t(()=>[e(m,{label:"Link SEO"},{default:t(()=>[e(T,{value:a.value.slug,"onUpdate:value":l[9]||(l[9]=n=>a.value.slug=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1}),e(m,{label:"Ti\xEAu \u0111\u1EC1"},{default:t(()=>[e(T,{value:a.value.title,"onUpdate:value":l[10]||(l[10]=n=>a.value.title=n),placeholder:"Nh\u1EADp..",class:"text-xs"},null,8,["value"])]),_:1}),e(m,{label:"Meta description"},{default:t(()=>[e(S,{value:a.value.meta_description,"onUpdate:value":l[11]||(l[11]=n=>a.value.meta_description=n),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1}),e(m,{label:"Meta keyword"},{default:t(()=>[e(S,{value:a.value.meta_keyword,"onUpdate:value":l[12]||(l[12]=n=>a.value.meta_keyword=n),placeholder:"Nh\u1EADp...",rows:4},null,8,["value"])]),_:1})]),_:1})]),_:1})]),_:1})]),_:1},8,["activeKey","onChange"]),e(Y,{align:"center",loading:b.value,class:"mt-5"},{default:t(()=>[e(U,{type:"primary","html-type":"submit"},{default:t(()=>[s("L\u01B0u")]),_:1}),e(U,{type:"primary",ghost:"",onClick:l[14]||(l[14]=n=>G())},{default:t(()=>[s("Tr\u1EDF v\u1EC1")]),_:1})]),_:1},8,["loading"])]),_:1},8,["model"])):g("",!0)]),_:1})]),_:1}),e(Z,{open:p.value,"onUpdate:open":l[15]||(l[15]=n=>p.value=n),width:"70%",title:"Danh s\xE1ch s\u1EA3n ph\u1EA9m",footer:null},{default:t(()=>[e(Q,{onSubmit:r.selectProduct},null,8,["onSubmit"])]),_:1},8,["open"]),e(ee,{open:f.value,"onUpdate:open":l[16]||(l[16]=n=>f.value=n),width:"70%",title:"Chi ti\u1EBFt l\u1ED9 tr\xECnh",footer:null,placement:"right"},{default:t(()=>[e(ye,{onSubmit:i,onClose:A,value:B.value},null,8,["value"])]),_:1},8,["open"])],64)}}});export{De as default};
