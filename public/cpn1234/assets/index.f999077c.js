import{r as d,c as u,a as o,w as t,_ as b,F as w,o as m,b as C,u as p,n as x,g as T,h,a1 as A,d as i,t as D,e as r,A as c,f,m as g,i as _}from"./index.e9f28c59.js";import"./InputUpload.vue_vue_type_script_lang.0f5c8a09.js";import{D as B}from"./DataTable.7d2f9362.js";import{F}from"./FormOutlined.0442b15f.js";const N={key:0,class:"flex items-center"},V=r("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),P={key:1,class:"flex items-center"},$=r("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),q={controls:""},H=["src"],M={__name:"index",setup(L){const k={api:e=>c.get("wards/list",{params:e}),addAction:e=>{f.push("/wards/0")},itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:g,key:"edit",action(e,n){f.push("/wards/"+e.id)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:g,key:"delete",action(e,n){c.delete("wards/"+e.id).then(s=>{_[s.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:s.data.message})}).finally(()=>{n()})}}],columns:[{title:"M\xE3 qu\u1EADn/huy\u1EC7n",key:"code"},{title:"T\xEAn qu\u1EADn/huy\u1EC7n",key:"name"},{title:"Qu\u1EADn/huy\u1EC7n",key:"district_name"},{title:"T\u1EC9nh/th\xE0nh ph\u1ED1",key:"province_name"},{title:"Qu\u1ED1c gia",key:"country_name"},{title:"Status",key:"status"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(e){return c.post("wards/activeList",{items:e,status:"A"}).then(n=>{_[n.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:n.data.message})})}},{title:"T\u1EAFt",action(e){return c.post("wards/activeList",{items:e,status:"D"}).then(n=>{_[n.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:n.data.message})})}}]};return(e,n)=>{const s=d("a-button"),y=d("a-popconfirm"),v=d("a-modal");return m(),u(w,null,[o(b,null,{default:t(()=>[o(C,null,{default:t(()=>[o(p(B),x(T(k)),{"cellAction[delete]":t(({item:a,actionMethod:l})=>[o(y,{title:"B\u1EA1n mu\u1ED1n x\xF3a s\u1EA3n ph\u1EA9m n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:l},{default:t(()=>[o(s,{type:"text",danger:"",icon:h(p(A)),label:"",outline:!0},null,8,["icon"])]),_:2},1032,["onConfirm"])]),"cellAction[edit]":t(({item:a,actionMethod:l})=>[o(s,{type:"text",icon:h(p(F)),label:"",outline:!0,onClick:l},null,8,["icon","onClick"])]),"cell[video]":t(({item:a,column:l})=>[o(s,{type:"link",onClick:O=>e.handlePreview(a)},{default:t(()=>[i("Xem video")]),_:2},1032,["onClick"])]),"cell[name]":t(({item:a,column:l})=>[i(D(a.name),1)]),"cell[status]":t(({item:a,column:l})=>[a.status=="D"?(m(),u("div",N,[V,i(" T\u1EAFt ")])):(m(),u("div",P,[$,i(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)]),_:1})]),_:1}),o(v,{open:e.previewVisible,title:e.previewTitle,footer:null,onCancel:e.handleCancel},{default:t(()=>[r("video",q,[r("source",{src:e.previewUrl},null,8,H)])]),_:1},8,["open","title","onCancel"])],64)}}};export{M as default};
