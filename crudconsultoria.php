<?php

include_once "conexaoconsultoria.php";
$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
switch($acao){
    case "inserir":

        $nomeEmpregado = $_POST['nomeEmpregado'];
        $tipoEmpregado = $_POST['tipoEmpregado'];
        $nomeProjeto = $_POST['nomeProjeto'];
        $dataProjeto = $_POST['dataProjeto'];
        $nomeDepto = $_POST['nomeDepto'];

        $sqlInsert1 = "INSERT INTO Empregado (nomeEmpregado, tipoEmpregado) VALUES ('$nomeEmpregado', '$tipoEmpregado');";
        $sqlInsert2 = "INSERT INTO Projeto (nomeProjeto, dataProjeto) VALUES ('$nomeProjeto', '$dataProjeto');";
        $sqlInsert3 = "INSERT INTO Departamento (nomeDepto) VALUES ('$nomeDepto');";

    if(!mysqli_query($conn,$sqlInsert1))
    {
        die("Erro ao inserir dados." . mysqli_error($conn));
    }
    elseif((!mysqli_query($conn,$sqlInsert2)))
    {
        die("Erro ao inserir dados." . mysqli_error($conn));
    }
    elseif((!mysqli_query($conn,$sqlInsert3)))
    {
        die("Erro ao inserir dados." . mysqli_error($conn));
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados cadastrados com sucesso!')
        window.location.href='crudconsultoria.php?acao=selecionar'</script>";
    }
    break;

    case 'montar':
        $id = $_GET['idEmpregado'];
        $sql = 'SELECT e.idEmpregado, e.nomeEmpregado, e.tipoEmpregado, p.nomeProjeto, p.dataProjeto, d.nomeDepto 
                FROM Empregado AS e 
                INNER JOIN Projeto AS p ON e.idEmpregado = p.idProjeto 
                INNER JOIN Departamento AS d ON e.idEmpregado = d.idDepto
                WHERE idEmpregado =' .$id;
       
        $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
       
        echo "<form method='post' name='dados' action='crudconsultoria.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";

        while($registro = mysqli_fetch_array($resultado)){

            $id = $registro['idEmpregado'];
            $nomeEmpregado = $registro['nomeEmpregado'];
            $tipoEmpregado = $registro['tipoEmpregado'];
            $nomeProjeto = $registro['nomeProjeto'];
            $dataProjeto = $registro['dataProjeto'];
            $nomeDepto = $registro['nomeDepto'];

            echo "<tr>";
            echo  "<td width = '118'><font size = '1' face='Verdana, Arial,  Helvetica, sans-serif'>Codigo:</font></td>";
            echo  "<td width = '460'>";
            echo  "<input name='id' type ='text' class='formbutton' id='id' size='5' maxlenght='10' value='" .$id."' readonly>";
            echo  "</td>";
            echo "</tr>";
        
            echo "<tr>";
            echo "<tr>";
            echo  "<td width='118'><font size = '1' face='Verdana, Arial,  Helvetica, sans-serif'>Nome Empregado:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo "<input type = 'text' name='nomeEmpregado' id='nomeEmpregado' value=".$registro['nomeEmpregado'].">";
            echo "</font></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<tr>";
            echo  "<td width='118'><font size = '1' face='Verdana, Arial,  Helvetica, sans-serif'>Tipo Empregado:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo "<input type = 'text' name='tipoEmpregado' id='tipoEmpregado' value=".$registro['tipoEmpregado'].">";
            echo "</font></td>";
            echo "</tr>";
        
            echo "<tr>";
            echo "<tr>";
            echo  "<td width='118'><font size = '1' face='Verdana, Arial,  Helvetica, sans-serif'>Resumo:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<input type='text' name='nomeProjeto' id='nomeProjeto' value='" .$registro['nomeProjeto'] . "'</input>";
            echo "</font></td>";
            echo "</tr>";


            echo "<tr>";
            echo "<tr>";
            echo  "<td width='118'><font size = '1' face='Verdana, Arial,  Helvetica, sans-serif'>Data:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<input type='date' name='dataProjeto' id='dataProjeto' value='" .$registro['dataProjeto'] . "'</input>";
            echo "</font></td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo  "<td width='118'><font size = '1' face='Verdana, Arial,  Helvetica, sans-serif'>Nome Departamento:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<input type='text' name='nomeDepto' id='nomeDepto' value='" .$registro['nomeDepto'] . "'</input>";
            echo "</font></td>";
            echo "</tr>";

            echo "<div align='center'>";
            echo "<tr>";
            echo "<tr>";
            echo "<td height = '22'></td>";
            echo "<td>";
            echo "<input type='submit' class='formobjects' value='Atualizar'>";
            echo "<button type='submit' formaction = 'crudconsultoria.php?acao=selecionar'>Consultar</button> ";
            echo "<input type='reset' name='reset' class='formobjects'  value='Limpar Campos'>";
            echo "</td>";
            echo "</tr>";
            echo "</div>";

            echo "</table>";
            echo "</form>";


        }
        mysqli_close($conn);
        break;

    case 'atualizar':
        $idEmpregado = $_POST['id'];
        $nomeEmpregado = $_POST['nomeEmpregado'];
        $tipoEmpregado = $_POST['tipoEmpregado'];
        $nomeProjeto = $_POST['nomeProjeto'];
        $dataProjeto = $_POST['dataProjeto'];
        $nomeDepto = $_POST['nomeDepto'];

        $sqlUpdate = "UPDATE Empregado e 
                      INNER JOIN Projeto p ON e.idEmpregado = p.idProjeto
                      INNER JOIN Departamento d ON e.idEmpregado = d.idDepto
                      SET e.nomeEmpregado ='$nomeEmpregado', e.tipoEmpregado='$tipoEmpregado',
                          p.nomeProjeto='$nomeProjeto', p.dataProjeto='$dataProjeto',
                          d.nomeDepto='$nomeDepto'
                      WHERE e.idEmpregado='$idEmpregado'";

        if(!mysqli_query($conn,$sqlUpdate)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conn));
        }
        else{
            echo "<script language='javascript' type='text/javascript'>
        alert('dados cadastrados com sucesso!')
        window.location.href='crudconsultoria.php?acao=selecionar'</script>";
        }
        break;

    case 'deletar':
        $id = $_GET['idEmpregado'];
        $sql = "DELETE e, d, p FROM Empregado e INNER JOIN Projeto AS p ON e.idEmpregado = p.idProjeto INNER JOIN Departamento AS d ON e.idEmpregado = d.idDepto WHERE idEmpregado = '" . $id . "'";
        
        if(!mysqli_query($conn,$sql))
    {
        die("erro ao inserir informações" . mysqli_error($conn));
    }
        else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('dados deletados com sucesso!')
        window.location.href='crudconsultoria.php?acao=selecionar'</script>";
    }
    mysqli_close($conn);
    header("Location:crudconsultoria.php?acao=selecionar");
         break;

    case 'selecionar':
        
        date_default_timezone_set('America/Sao_Paulo');
      
        
        echo"<meta charset='UTF-8'>";
        echo"<center><table border=1>";
        echo"<tr>";
        echo"<th>CÓDIGO</th>";
        echo"<th>NOME EMPREGADO</th>";
        echo"<th>TIPO</th>";
        echo"<th>RESUMO</th>";
        echo"<th>DATA</th>";
        echo"<th>NOME DEPARTAMENTO</th>";
        echo"</tr>";

        $sqlInsert = 'SELECT e.idEmpregado, e.nomeEmpregado, e.tipoEmpregado, p.nomeProjeto, p.dataProjeto, d.nomeDepto 
                      FROM Empregado AS e 
                      INNER JOIN Projeto AS p ON e.idEmpregado = p.idProjeto 
                      INNER JOIN Departamento AS d ON e.idEmpregado = d.idDepto';
                      
        $resultado = mysqli_query($conn,$sqlInsert) or die("Erro ao retornar dados");
        

        echo"<center>Registro cadastrados na base de dados.<br/></center>";
        echo"</br>";

      while($registro = mysqli_fetch_array($resultado)){
            
            $idEmpregado = $registro['idEmpregado'];
            $nomeEmpregado = $registro['nomeEmpregado'];
            $tipoEmpregado = $registro['tipoEmpregado'];
            $nomeProjeto = $registro['nomeProjeto'];
            $dataProjeto = $registro['dataProjeto'];
            $nomeDepto = $registro['nomeDepto'];
            
            echo"<tr>";
            echo"<td>" . $idEmpregado . "</td>";
            echo"<td>" . $nomeEmpregado . "</td>";
            echo"<td>" . $tipoEmpregado . "</td>";
            echo"<td>" . $nomeProjeto . "</td>";
            echo"<td>" . date("d/m/Y", strtotime($dataProjeto)) . "</td>";
            echo"<td>" . $nomeDepto . "</td>";
            echo"<td> <a href='crudconsultoria.php?acao=deletar&idEmpregado=$idEmpregado'><img src='delete.png' alt='Deletar registro'></a>
            <a href='crudconsultoria.php?acao=montar&idEmpregado=$idEmpregado'><img src='update.png' alt='Atualizar' title='Atualizar registro'</a>
            <a href='consultoria.php'><img src='insert.png' alt='Inseir' title='Inserir registro'></a></td>";
            echo "</tr>";
        }
        mysqli_close($conn);
        break;

        default:
        header("Location:crudconsultoria.php?acao=selecionar");
        break;
}
?>
