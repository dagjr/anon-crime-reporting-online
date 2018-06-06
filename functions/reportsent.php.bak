
<!DOCTYPE html>
<HTML>
  <HEAD>
		<title>Web Tips</title>

		<meta content="width=device-width; maximum-scale=1.0; " name=viewport>
<LINK href="../css/awesome.css" type=text/css rel=stylesheet >

<script language=JavaScript type=text/javascript>
function init(){
     var str1 = document.getElementById('btnClose');
     if (str1!=null) {
      if (document.getElementById('lLang').value=='S') {
        document.getElementById('btnClose').value='Cierre';
        document.getElementById('btnPrint').value='Impresión';
      }
      if (document.getElementById('lLang').value=='F') {
        document.getElementById('btnClose').value='Fin';
        document.getElementById('btnPrint').value='Caractères';
      }
     }else{
       if (document.Form1.sName != null){document.Form1.sName.focus()};
     }
     showOrHideFooter();
}

function showOrHideFooter(){
  //Check to see if this panel is loaded.
  if(document.getElementById('panel2footer')){
	//Check to see if the page is in an iframe or not.
    //If self is top then we are not in an iframe
	if(window.self === window.top){
		document.getElementById('panel2footer').style.display='table-row';
	}
	else{
		document.getElementById('panel2footer').style.display='none';
	}
  }
}

//-->

</script>
</HEAD>
<body vLink=#000099 link=#000099 bgColor=#f0f0f0 onload="javascript: init();">
<form name="Form1" method="post" enctype="multipart/form-data">

<div id=MainPanel></DIV>
			<!-- **************************************************************************************** --><div id="Panel2" name="Panel2" style="height:104px;">

<TABLE height="100%" cellPadding=0 width="100%" border=0 bbgColor="#ffffff">
  <TR>
    <TD>
      <TABLE
      style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid; BORDER-COLLAPSE: collapse"
      cellPadding=5 width=510 align=center bgColor=white border=1>
        <TR>
          <TH colSpan=2>
            <P><span id="lblAgency" style="background-color:White;font-size:18pt;font-weight:bold;">CALGARY CRIME STOPPERS</span><BR><STRONG><U><span id="lConfidential2" style="font-size:14px;">Confidential Web Tip Information System</span></U></STRONG></P></TH></TR>
        <TR>
        <TR>
          <TD vAlign=bottom align=center colSpan=2>
            <TABLE style="BORDER-COLLAPSE: collapse" height=76 width=500
            bgColor=#eeeeee border=1>
              <TR>
                <TD vAlign=middle align=center>
                  <TABLE border=0>
                    <TR>
                      <TD align=right><span id="lCodeNumber">Your code number is:</span></TD>
                      <TD align=center><span id="txtWebTipNumber" style="display:inline-block;color:#C00000;background-color:#EEEEEE;font-weight:bold;height:15px;width:135px;">   <?=$_GET['referenceID']?>   </span></TD></TR>
                    <TR>
                      <TD align=right><span id="lYourPassword">Your password is: </span></TD>
                      <TD align=center><span id="lblPassword" style="display:inline-block;color:#C00000;background-color:#EEEEEE;font-weight:bold;height:15px;width:136px;"><?=$_GET['referencePassword']?></span></TD></TR></TABLE></TD></TR></TABLE></TD></TR>
        <TR>
          <TD align=center colSpan=2><span id="lDoNotLose"><B>DO
            NOT LOSE THE ABOVE CODE NUMBER AND PASSWORD.<BR>IT IS THE ONLY WAY
            TO CHECK THE STATUS OF YOUR TIP.</B> <BR>Be
            sure to login at <A
            href="https://www.tipsubmit.com/">www.tipsubmit.com</A> to provide
            any additional information to this tip. Also, login often to see if
            there are any follow up questions pending which you could possibly
            answer. </span></TD></TR>
        <TR>
          <TD vAlign=top colSpan=2>
            <TABLE style="BORDER-COLLAPSE: collapse" width=500 align=center
            bgColor=#eeeeee border=1>
              <TR>
                <TD>
                  <TABLE align=center bgColor=#eeeeee border=0>
                    <TR></TR>
                    <TR>
                      <TD vAlign=top align=center><span id="lPhone">Phone:</span><span id="lblPhone" style="background-color:#EEEEEE;font-family:Arial;">990,000<input type=hidden id=lLang value='E'></span></TD></TR>
                    <TR>
                      <TD align=center><span id="lblNotes" style="display:inline-block;background-color:#EEEEEE;font-family:Arial;width:472px;">Thank you for submitting your tip with us online. Please log back in and use the online Follow-Up feature OR call us between 9a and 8p Mon-Thu, or 9a-3p on Fri to check the status of your tip or any time to provide additional information. Be sure and keep up with your assigned ID#. IF THIS IS AN URGENT MATTER DO NOT SUBMIT IT HERE ALONE. EITHER CALL CRIME STOPPERS DIRECTLY OR DIAL 911 IF IT IS AN EMERGENCY!</span></TD></TR></TABLE></TD></TR></TABLE></TD></TR>
        <TR id="panel2footer" style="display:none">
          <TD colSpan=2>
            <P align=center><INPUT class=btn id=btnPrint onmouseover="this.className='btn btnhov'" style="FONT-SIZE: 16px; WIDTH: 100px; FONT-FAMILY: arial; HEIGHT: 35px" onclick=javascript:window.print(); onmouseout="this.className='btn'" type=button size=20 value=Print>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT class=btn id=btnClose onmouseover="this.className='btn btnhov'" style="FONT-SIZE: 16px; WIDTH: 100px; FONT-FAMILY: arial; HEIGHT: 35px" onclick=javascript:top.window.close(); onmouseout="this.className='btn'" type=button value=Close>
            <BR><a id="HyperLink3" href="http://tipsoft.com" style="color:Gray;background-color:White;font-size:XX-Small;">© </a><a id="HyperLink4" href="http://crimestop.com/" style="color:Gray;background-color:White;font-size:XX-Small;"> &lt;/&gt;</a></P></TD></TR></TABLE>
      <CENTER></CENTER></TD></TR></TABLE>
</div>
<P>&nbsp;</P>
<P>
		</form>
	</body>
</HTML>
