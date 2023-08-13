import{b as J,j as b,z as j,r as p,o as n,e as s,a as i,g as v,l as f,w as u,c as m,B as Q,p as y,u as K,R as W,F as w,f as _,i as x,t as C,D as X,n as I,h as D,C as N,E as O,G as R,m as Y,H as Z,I as ee,q as te,s as ae}from"./index.58385aa2.js";const F=a=>(te("data-v-94da8ace"),a=a(),ae(),a),le={class:"flex flex-col text-center h-full sm:rounded-lg"},ne=["loading"],oe=F(()=>i("span",null,null,-1)),se={class:"overflow-auto scroll-smooth flex-1 w-full h-full"},ie={class:"table-auto w-full mt-5"},re={class:"text-xs font-semibold uppercase text-gray-400 bg-gray-50"},ce={key:0,scope:"col",class:"p-2 whitespace-nowrap"},ue={class:"w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},de={scope:"col",class:"p-2 whitespace-nowrap"},ge={class:"font-semibold text-left"},pe={key:1,scope:"col",class:"p-2 whitespace-nowrap"},fe={class:"text-sm divide-y divide-gray-100"},ye={key:0,class:"p-2 whitespace-nowrap"},he=["for"],me=["id","value"],ke={key:1,class:"p-2 whitespace-nowrap"},be=F(()=>i("br",null,null,-1)),ve={key:0},we={key:1},_e={__name:"DataTable",props:{tableConfig:{type:Object,default:{}},pagination:{type:Object,default:{page:1,total:0,perPage:10}},showSizeChanger:{type:Boolean,default:!0},params:{type:Object,default:{}},columns:Array,selectionActions:{type:Array,default:[]},itemActions:{type:Array,default:[]},api:Function,addAction:Function},setup(a){const r=a,d={item_key:"id",rowSelect:!0,globalSearch:!0,...r.tableConfig},h=b({}),P=b("");j(()=>{const t=r.columns.map(l=>({dataIndex:l.dataIndex?l.dataIndex:l.key,...l}));return r.itemActions.length&&t.push({title:"H\xE0nh \u0111\u1ED9ng",key:"action",width:200,dataIndex:"action"}),t});function c(){r.api&&(A.value=!0,r.api({perPage:r.pagination.perPage,page:r.pagination.page,...r.params,"filter[search]":P.value}).then(t=>{var l;h.value=t.data,r.pagination.total=(l=t.data)!=null&&l.total?t.data.total:0}).finally(()=>{S.value=!1,A.value=!1}))}const A=b(!1),S=b(!1);b([]);const g=b([]);async function T(t){const l=g.value.map($=>$[d.item_key]);await t.action(l,g.value),t.complete&&t.complete(),g.value=[],c()}function E(){S.value?g.value=ee((h==null?void 0:h.value.data)||[]):g.value=[]}return j(()=>!r.selectionActions||!r.selectionActions.length?!1:{onChange:(t,l)=>{console.log(`selectedRowKeys: ${t}`,"selectedRows: ",l)},getCheckboxProps:t=>({disabled:t.name==="Disabled User",name:t.name})}),c(),(t,l)=>{var U,V;const $=p("a-input"),B=p("a-space"),z=p("a-button"),H=p("a-menu-item"),M=p("a-menu"),q=p("a-dropdown"),G=p("a-empty"),L=p("a-pagination");return n(),s("div",le,[i("div",{loading:A.value,class:"flex items-center pb-2 justify-between bg-white dark:bg-gray-800"},[v(t.$slots,"header",I(D({tableConfig:d,reload:c})),()=>[f(B,null,{default:u(()=>[d.globalSearch?(n(),m($,{key:0,"allow-clear":"",onSearch:c,onKeyup:Q(c,["enter"]),style:{"max-width":"300px"},value:P.value,"onUpdate:value":l[0]||(l[0]=e=>P.value=e),placeholder:"Enter to search...",loading:A.value},null,8,["onKeyup","value","loading"])):y("",!0),v(t.$slots,"filter",{},void 0,!0)]),_:3}),oe,f(B,null,{default:u(()=>[f(z,null,{icon:u(()=>[f(K(W),{onClick:c})]),_:1}),a.selectionActions.length>0?(n(),m(q,{key:0,disabled:!g.value.length},{overlay:u(()=>[f(M,null,{default:u(()=>[(n(!0),s(w,null,_(a.selectionActions,(e,k)=>(n(),m(H,{onClick:o=>T(e),key:k},{default:u(()=>[x(C(e.title),1)]),_:2},1032,["onClick"]))),128))]),_:1})]),default:u(()=>[f(z,null,{default:u(()=>[x(" H\xE0nh \u0111\u1ED9ng "),f(K(X))]),_:1})]),_:1},8,["disabled"])):y("",!0),a.addAction?(n(),m(z,{key:1,type:"primary",onClick:l[1]||(l[1]=()=>{a.addAction(c)})},{default:u(()=>[x("Th\xEAm m\u1EDBi")]),_:1})):y("",!0)]),_:1})],!0)],8,ne),i("div",se,[(U=h.value.data)!=null&&U.length?v(t.$slots,"table",I(Y({key:0},{tableConfig:d,tableData:h.value,columns:a.columns,selectionActions:a.selectionActions,reload:c})),()=>[i("table",ie,[i("thead",re,[i("tr",null,[a.selectionActions.length>0?(n(),s("th",ce,[i("label",ue,[N(i("input",{onChange:E,value:!0,"onUpdate:modelValue":l[2]||(l[2]=e=>S.value=e),type:"checkbox",class:"w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,544),[[O,S.value]])])])):y("",!0),(n(!0),s(w,null,_(a.columns,e=>(n(),s("th",de,[i("div",ge,C(t.__(e.title)),1)]))),256)),a.itemActions.length?(n(),s("th",pe,C(t.__("Action")),1)):y("",!0)])]),i("tbody",fe,[(n(!0),s(w,null,_(h.value.data,(e,k)=>(n(),s("tr",{key:e[d.item_key],class:R({"border-b":k%2===0})},[d.rowSelect?(n(),s("td",ye,[i("label",{for:"checkbox-table-search-"+e[d.item_key],class:"w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"},[N(i("input",{"onUpdate:modelValue":l[3]||(l[3]=o=>g.value=o),id:e[d.item_key],value:e,type:"checkbox",class:"w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"},null,8,me),[[O,g.value]])],8,he)])):y("",!0),(n(!0),s(w,null,_(a.columns,o=>(n(),s("td",{class:R("p-2 whitespace-nowrap"+(o.class?o.class:""))},[v(t.$slots,"cell["+o.key+"]",I(D({item:e,column:o,index:k})),()=>[x(C(t.$style.format[o.key]?t.$style.format[o.key](e[o.key]):e[o.key]),1)],!0)],2))),256)),a.itemActions.length?(n(),s("td",ke,[(n(!0),s(w,null,_(a.itemActions,o=>v(t.$slots,"cellAction["+o.key+"]",I(D({item:e,itemAction:o,actionMethod(){o.action(e,c)}})),()=>[f(z,{onClick:xe=>o.action(e,c),class:R(o.class||"font-medium text-blue-600 dark:text-blue-500 hover:underline"),type:"link"},{default:u(()=>[x(C(o.label),1)]),_:2},1032,["onClick","class"])],!0)),256))])):y("",!0)],2))),128))])])],!0):(n(),m(G,{key:1})),be]),(V=a.pagination)!=null&&V.total?(n(),m(L,{key:0,style:{height:"40px"},class:"pt-2",showSizeChanger:a.showSizeChanger,onChange:c,current:a.pagination.page,"onUpdate:current":l[4]||(l[4]=e=>a.pagination.page=e),pageSize:a.pagination.perPage,"onUpdate:pageSize":l[5]||(l[5]=e=>a.pagination.perPage=e),total:a.pagination.total},{itemRender:u(({type:e,originalElement:k})=>[e==="prev"?(n(),s("a",ve,"Previous")):e==="next"?(n(),s("a",we,"Next")):(n(),m(Z(k),{key:2}))]),_:1},8,["showSizeChanger","current","pageSize","total"])):y("",!0)])}}},Ae=J(_e,[["__scopeId","data-v-94da8ace"]]);export{Ae as D};
