<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Registration.aspx.cs" Inherits="WebApplication2.Registration" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .auto-style1 {
            width: 100%;
        }
        .auto-style2 {
        }
        .auto-style3 {
            width: 486px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <table class="auto-style1">
            <tr>
                <td colspan="2">
                    <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Italic="True" ForeColor="Red" style="z-index: 1; left: 428px; top: 14px; position: absolute; bottom: 319px" Text="REGISTRATION"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
            </tr>
            <tr>
                <td class="auto-style3">Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server" Width="184px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Adress</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server" TextMode="MultiLine" Width="185px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Gender</td>
                <td>
                    <asp:RadioButtonList ID="RadioButtonList1" runat="server" Height="24px" RepeatDirection="Horizontal" Width="187px">
                        <asp:ListItem>male</asp:ListItem>
                        <asp:ListItem>female</asp:ListItem>
                    </asp:RadioButtonList>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Course</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" Height="16px" Width="188px">
                        <asp:ListItem>MCA</asp:ListItem>
                        <asp:ListItem>EC</asp:ListItem>
                        <asp:ListItem>MA</asp:ListItem>
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Email</td>
                <td>
                    <asp:TextBox ID="TextBox3" runat="server" Width="180px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Username</td>
                <td>
                    <asp:TextBox ID="TextBox4" runat="server" Width="183px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Password</td>
                <td>
                    <asp:TextBox ID="TextBox5" runat="server" Height="16px" TextMode="Password" Width="180px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">Confirm Password</td>
                <td>
                    <asp:TextBox ID="TextBox6" runat="server" TextMode="Password" Width="178px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style3">
                    <asp:CheckBox ID="CheckBox1" runat="server" Text="I here by declare all the above detasils is correct" />
                    <asp:Button ID="Button1" runat="server" style="position: absolute; z-index: 1; left: 469px; top: 291px" Text="SUBMIT" />
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="auto-style2" colspan="2">&nbsp;</td>
            </tr>
        </table>
    <div>
    
    </div>
    </form>
</body>
</html>
