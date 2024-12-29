<%
	Dim sRecipient = "someone@domain.com"
	Dim sRedirect = "http://www.domain.com/"
	Dim bValid = true
	Dim objMail
	
	If Request.QueryString("inputContactName") = "" Then bValid = false End If
	If Request.QueryString("inputContactEmail") = "" Then bValid = false End If
	If Request.QueryString("inputContactSubject") = "" Then bValid = false End If
	If Request.QueryString("inputContactMessage") = "" Then bValid = false End If
	
	If bValid Then
		Set objMail = Server.CreateObject("CDO.Message")
		objMail.From = Request.QueryString("inputContactEmail")
		objMail.To = sRecipient 
		objMail.Subject = Request.QueryString("inputContactSubject") 
		objMail.TextBody = Request.QueryString("inputContactMessage")
		
		objMail.Send
	End If
	
	objMail = Nothing
	Response.Redirect(sRedirect)
%>