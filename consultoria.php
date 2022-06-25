<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultoria de Negócios</title>
    </head>
    <body>
        <table width="580" border="0" align="center">
                <tr>
                    <td width="1000">
                        <font size="5" face="Verdana, Arial, Helvetica, sans-serif">
                           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                           REGISTROS DE NEGÓCIOS</font>
                    </td>
                </tr>
        </table>
        <hr>
        <table width="580" border="0" align="center">
                <tr>
                    <td width="1000">
                        <font size="4" face="Verdana, Arial, Helvetica, sans-serif">
                           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                           Detalhes do Empregado</font>
                    </td>
                </tr>
        </table>
        <form method="post" name="dados" action="crudconsultoria.php?acao=inserir" 
        onSubmit="return enviarDados();">
        <table width="588" border="0" align="center">
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome completo:</font>
            </td>
            <td width="460">
               <input name="nomeEmpregado" type="text" class="formbutton" id="nomeEmpregado" size="52" maxlength="150">
            </td>
         </tr>
         <tr>
            <td width="108">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Tipo de Empregado:</font>
                <input type="radio" id="gerente" name="tipoEmpregado" value="Gerente">
                    <label for="gerente"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Gerente</font></label></br>
                <input type="radio" id="funcionario" name="tipoEmpregado" value="Funcionario">
                    <label for="funcionario"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Funcionário</font></label></br>
            </td>
         </tr>
        </table>
        <hr>
        <table width="580" border="0" align="center">
                <tr>
                    <td width="1000">
                        <font size="4" face="Verdana, Arial, Helvetica, sans-serif">
                           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                           Detalhes do Projeto</font>
                    </td>
                </tr>
        </table>
        <table width="588" border="0" align="center">
        <tr>
            <td>
               <font face="Verdana, Arial, Helvetica, sans-serif">
                  <font size="1">Resumo <strong>:</strong></font>
               </font>
            </td>
            <td rowspan="2">
               <font size="2">
                  <textarea name="nomeProjeto" cols="50" rows="5" class="formbutton" id="nomeProjeto" input></textarea>
               </font>
            </td>
         </tr>
         <tr>
            <td height="85">
               <p><strong>
                     <font face="Verdana, Arial, Helvetica, sans-serif">
                        <font size="1">
                        </font>
                     </font>
                  </strong></p>
            </td>
         </tr>
         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Data:</font>
            </td>
            <td>
               <font size="2">
                  <input name="dataProjeto" type="date" id="dataProjeto" class="formbutton">
               </font>
            </td>
         </tr>
        </table>
        <hr>
        <table width="580" border="0" align="center">
                <tr>
                    <td width="1000">
                        <font size="4" face="Verdana, Arial, Helvetica, sans-serif">
                           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                           Departamento do Empregado</font>
                    </td>
                </tr>
        </table>
        <table width="588" border="0" align="center">
         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome Departamento:</font>
            </td>
            <td width="460">
               <input name="nomeDepto" type="text" class="formbutton" id="nomeDepto" size="52" maxlength="150">
            </td>
         </tr>
        </table>
        <hr>
        <table width="588" border="0" align="center">
        <tr>
            <td height="22"></td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
               <input name="Submit" type="submit" class="formobjects" value="Cadastrar">
               <button type='submit' formaction='crudconsultoria.php?acao=selecionar'>Consultar</button>
              </button>
            </td>
         </tr>
        </table>
    </body>
</html>