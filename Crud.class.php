 <?php

/**
 * Classe responsavel por fazer as operações de INSERT, UPDATE, DELETE E SELECT no banco de dados.
 * 
 * @author Julio Augusto
 * @version 1.0.0
 * @copyright Julio Augusto © 2018, www.julioaugusto.me
 * @example Classe Crud();
*/ 

 class Crud extends Conexao {

    # Método responsavel por buscas informações na base de dados
    public function read($table, $campos = null, $where = null, $order = null) {

        $pdo = $this->efetuaConexao();

        $select = 'SELECT ';
        if(is_array($campos)):
            $imp = implode(', ', $campos);
            $select .= $imp;
        elseif(is_null($campos)):
            $select .= " * ";
        endif;
        
        $select .= ' FROM '.$table.'';
        if(!is_null($where)):
            $select .= " WHERE $where";      
        endif;
        
        if(!is_null($order)):
            $select .= " ORDER BY $order";
        endif;
        
        $sel = $pdo->prepare($select);
        $sel->execute();

        return $sel;          

    }
    
    # Método responsavel por inserir dados na tabela
    public function insert($tabela, array $campos){

        $pdo = $this->efetuaConexao();

        $strInsert = "INSERT INTO `".$tabela."` SET ";
        $valores = array_values($campos);
        $n = 0;
        foreach(array_keys($campos) as $i => $campo):
            $strInsert .= "`".$campo."` = '".$valores[$i]."'";
            $n++;
            if($n < count($valores)):
                $strInsert .= ", ";
            endif;      
        endforeach;
        
        $insert = $pdo->prepare($strInsert);
        if($insert->execute()):
            return true;
        else:
            return false;
        endif;            

    }
    
    # Método responsavel por editar informações na base de dados
    public function update($tabela, array $dados, $where = null) {

        $pdo = $this->efetuaConexao();

        $strUpdate = "UPDATE `".$tabela."` SET ";
        $valores = array_values($dados);

        $n = 0;
        foreach(array_keys($dados) as $i => $campo):
            $strUpdate .= "`".$campo."` = '".$valores[$i]."'";
            $n++;
            if($n < count($valores)):
                $strUpdate .= ", ";
            endif;
        endforeach;

        if(!is_null($where)):
            $strUpdate .= " WHERE $where";
        endif;
        
        $update = $pdo->prepare($strUpdate);
        if($update->execute()):
            return true;
        else:
            return false;
        endif;                

    }

    # Método responsavel por excluir informações da base de dados
    public function delete($tabela, $where) {

        $pdo = $this->efetuaConexao();

        $strDelete = "DELETE FROM `".$tabela."` WHERE ".$where."";
        $del = $pdo->prepare($strDelete);
        if($del->execute()):
            return true;
        else:
            return false;
        endif;        

    }

}    