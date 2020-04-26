function t(){
v=new Date();
n=new Date();
o=new Date();
bxx=document.getElementById('bxx');
ss=bxx.title;
s=ss-Math.round((n.getTime()-v.getTime())/1000);
m=0;h=0;
if(s >= 0) 
{
if(s>59)
{
m=Math.floor(s/60);
s=s-m*60
}
if(m>59)
{
h=Math.floor(m/60);
m=m-h*60
}
if(s<10)
{
s="0"+s
}
if(m<10)
{
m="0"+m
}
bxx.innerHTML=h+":"+m+":"+s+"";
}
bxx.title=bxx.title-1;
//window.setTimeout("t()",1000);
}


function tt(){
v=new Date();
n=new Date();
o=new Date();
bxxx=document.getElementById('bxxx');
ss=bxxx.title;
s=ss-Math.round((n.getTime()-v.getTime())/1000);
m=0;h=0;
if(s >= 0) 
{
if(s>59)
{
m=Math.floor(s/60);
s=s-m*60
}
if(m>59)
{
h=Math.floor(m/60);
m=m-h*60
}
if(s<10)
{
s="0"+s
}
if(m<10)
{
m="0"+m
}
bxxx.innerHTML=h+":"+m+":"+s+"";
}
bxxx.title=bxxx.title-1;
//window.setTimeout("t()",1000);
}