<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/material-wfont.min.css" rel="stylesheet">
</head>
<style>
p{
    text-align: justify;
}
</style>
<body style="background-color: white;">
<div class="container">
    <h1>Álgebra de Conjuntos</h1>
    <blockquote>
        <p style="text-align: justify;">Álgebra é constituída de operações definidas sobre uma soleção de objetos. Neste contexto, álgebra de conjuntos corresponderia às operações definidas sobre todos os conjuntos.
            <a href="javascript:modalFunction();" class="label label-primary">Funções em PHP para Conjuntos</a>
        </p>
    </blockquote>
    <div class="list-group">
        <?php
            require "classes/file.php";
            $instancia = new file();
            $files = $instancia->loadingFilesDirectorios("files/");
            $filesOutput = $instancia->loadingFilesDirectorios("output/", "output");
        ?>
        <?php if(count($files) == 0): ?>
            <div class="list-group-item">
                <div class="row-action-primary">
                    <i class="mdi-notification-dnd-forwardslash"></i>
                </div>
                <div class="row-content">
                    <h4 class="list-group-item-heading">Não há arquivos no Diretório.</h4>
                </div>
            </div>
        <?php else: ?>
            <div class="col-lg-12">
                <p style="text-align: justify;">
                    <small>Exercício 2.3:Considerando uma linguagem de programação que forneça suporte a conjuntos e operações sobre eles, crie um programa que leia conjuntos em arquivos texto (um elemento do conjunto em cada linha) e gere a saída também em um arquivo texto (também um elemento em cada linha). O programa deve considerar e demonstrar a utilização das operações e propriedades vistas até o momento (e.g. pertiência, contingência, união e intersecção).</small>
                </p>
            </div>
            <div class="col-lg-6">
                <h2>Arquivos de Entrada</h2>
                <form action="result.php" method="get" id="formPrincipal">
                    <?php foreach($files as $f): ?>
                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-action-description"></i>
                            </div>
                            <div class="row-content">
                                <h4 class="list-group-item-heading">Conteúdo: <?= $f['Conteudo'] ?></h4>
                                <p class="list-group-item-text">Nome: <a href="<?= $f['Caminho'].$f['Nome'] ?>" target="_blank"><?= $f['Nome'] ?></a></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="radio radio-primary">
                        <label title="Arquivos: file1.txt e file2.txt" >
                            <input type="radio" name="optionTipo"  value="Pertinencia"  <?= isset($_GET['optionTipo']) ? ($_GET['optionTipo'] == "Pertinencia" ? 'checked':'' ):'' ?> required="" >Pertinência
                        </label>
                        <label>
                            <input type="radio" name="optionTipo"  value="Contingencia" <?= isset($_GET['optionTipo']) ? ($_GET['optionTipo'] == "Contingencia" ? 'checked':'' ):'' ?> required="">Contingência
                        </label>
                        <label>
                            <input type="radio" name="optionTipo"  value="Uniao" <?= isset($_GET['optionTipo']) ? ($_GET['optionTipo'] == "Uniao" ? 'checked':'' ):'' ?> required="">União
                        </label>
                        <label>
                            <input type="radio" name="optionTipo" value="Interseccao" <?= isset($_GET['optionTipo']) ? ($_GET['optionTipo'] == "Interseccao" ? 'checked':'' ):'' ?> required="">Intersecção
                        </label>
                        <label>
                            <input type="radio" name="optionTipo" value="Complemento" <?= isset($_GET['optionTipo']) ? ($_GET['optionTipo'] == "Complemento" ? 'checked':'' ):'' ?> required="">Complemento
                        </label>
                    </div>
                    <button type="button" class="btn btn-primary" id="btnVerificar">Verificar</button>
                </form>
                <div class="list-group-separator"></div>
            </div>
            <div class="col-lg-6">
                <h2>Arquivo de Saída (Output)</h2>
                <?php foreach($filesOutput as $f): ?>
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-action-description"></i>
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Conteúdo: <?= $f['Conteudo'] ?></h4>
                            <p class="list-group-item-text">Nome: <a href="<?= $f['Caminho'].$f['Nome'] ?>" target="_blank"><?= $f['Nome'] ?></a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <hr/><br/><br/>
                <a href="javascript:modalQuestao21()" class="btn btn-info">Questão 2.1</a>
                <a href="javascript:modalQuestao24()" class="btn btn-info">Questão 2.4</a>
                <a href="javascript:modalSobre()" class="btn btn-info">Informações</a>
            </div>

        <?php endif; ?>
    </div>
</div>

<div id="source-modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Linguagem PHP</h4>
                <p style="text-align: justify;">
                    <small>Exercício 2.2: Algumas linguagens de programação possuem estruturas de dados para conjuntos, as quais disponibilizam, também, operações sobre estes. Faça uma pesquisa sobre linguagens de programação e, selecionando uma linguagem de programação que suporte definição de conjuntos e operações sobre eles, apresente exemplos, contemplando as operações e propriedades vistas até o momento (e.g. pertiência, contingência, união e intersecção).</small>
                </p>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pertinência</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>in_array($char, $conjunto1)</code>, onde é verificado se um elemento está contido em um conjunto. Retornar um bool.
                        </p>
                        <pre>$existe = in_array($elemento, $file);<code style="color:#15c000;">//Verifica se o elemento está contido e guarda um true ou false na variavel $existe.</code>
if($existe){
    $instancia->writeText("output","output.txt", "O Elemento ".$elemento." está contido no Conjunto ".$arquivo);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code>
}else{
    $instancia->writeText("output","output.txt", "O Elemento ".$elemento." NÃO está contido no Conjunto ".$arquivo);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code>
}</pre>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contingência</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>array_diff($conjunto1, $conjunto2)</code> o qual analisará as diferenças entre os conjuntos
                        </p>
                        <pre>$result1 = array_diff($file_2,$file_1);<code style="color:#15c000;">//Compara os elementos entre os conjuntos e retorna aqueles que estão no $file_1 que não estão no $file_2</code>
$result2 = array_diff($file_1,$file_2);<code style="color:#15c000;">//Compara os elementos entre os conjuntos e retorna aqueles que estão no $file_2 que não estão no $file_1</code>

if(empty($result2) && count($result1) > 0){<code style="color:#15c000;">//Verifica se é subconjunto próprio</code>
    $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." é SubConjunto próprio do Conjunto ".$arquivo2);
}else{
    if(empty($result2) && empty($result1)){<code style="color:#15c000;">//Verifica se é subconjunto(igualdade)</code>
        $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." é SubConjunto do Conjunto ".$arquivo2);
    }else{
        $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." NÃO é SubConjunto do Conjunto ".$arquivo2);
    }
}</pre>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">União</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>array_merge($conjunto1, $conjunto2)</code>,
                            a qual funde os 2 conjuntos e os elementos do segundo conjunto é colocado no final do array que será retornado.
                            Foi necessário utilizar a função <code>array_unique($param)</code> que elimina todos os elementos repetidos.
                        </p>
                        <pre>$result = array_unique(array_merge($file1, $file2));<code style="color:#15c000;">//Funde os dois conjuntos.</code><br/>$instancia->writeFile("output","output.txt",$result);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code></pre>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Intersecção</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>array_uintersect($conjunto1, $conjunto2, $callback)</code>, a qual computação a interseção de array, comparando dados com uma função callback.
                            A função callback <code>"strcasecmp"</code> é necessária para a comparação de strings sem diferenciar maiúsculas e minúsculas.
                        </p>
                        <pre>$result = array_uintersect($file1, $file2,"strcasecmp");<code style="color:#15c000;">//Intersecção entre os Conjuntos retornando a variavel $result.</code><br/>$instancia->writeFile("output","output.txt",$result);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="source-modal2" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pertinência</h4>
            </div>
            <div class="modal-body">
                <form action="result.php" method="get" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label for="Elemento">Elemento</label>
                            <input type="text" class="form-control" name="Elemento" id="Elemento" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <label for="Elemento">Selecione um Arquivo</label>
                            <div class="radio">
                                <?php foreach($files as $f): ?>
                                    <label>
                                        <input type="radio" name="optionSelection" value="<?= $f['Nome'] ?>" required=""><?= $f['Nome'] ?><br/>
                                        <small class="list-group-item-heading">Conteúdo: <?= $f['Conteudo'] ?></small>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="optionTipo" id="optionTipo" />
                    <button type="submit" class="btn btn-primary">Verificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="source-modal3" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Contingência</h4>
            </div>
            <div class="modal-body">
                <form action="result.php" method="get">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label for="Elemento">Selecione o primeiro conjunto</label>
                                <?php foreach($files as $f): ?>
                                    <div class="radio  radio-primary">
                                        <label>
                                            <input type="radio" name="optionSelection1" value="<?= $f['Nome'] ?>" required=""><?= $f['Nome'] ?><br/>
                                            <small class="list-group-item-heading">Conteúdo: <?= $f['Conteudo'] ?></small>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label for="Elemento">Selecione o segundo conjunto</label>
                                <?php foreach($files as $f): ?>
                                    <div class="radio radio-primary">
                                        <label>
                                            <input type="radio" name="optionSelection2" value="<?= $f['Nome'] ?>" required=""><?= $f['Nome'] ?><br/>
                                            <small class="list-group-item-heading">Conteúdo: <?= $f['Conteudo'] ?></small>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                        </div>
                    </div>
                    <input type="hidden" name="optionTipo" id="optionTipo2" />
                    <button type="submit" class="btn btn-primary">Verificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="source-modal4" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Questão 2.1</h4>
            </div>
            <div class="modal-body">
                <p>
                1	- Prove as propriedades idempotência, comutativa e associativa da união.<br/><br/>

                1.1.	Idempotência: A ∪ A=A<br/>
                1.1.1.	A ∪ A ⊆ A ⇒ (definição de união)<br/>
                x ∈ A ∪ A ⇒ (Idempotência da disjunção)<br/>
                x ∈ A ∨ x ∈ A<br/>
                x ∈ A<br/><br/>
                1.1.2.	A ⊆ A ∪ A<br/>
                x ∈ A ⇒ (disjunção)<br/>
                x ∈ A ∨ x ∈ A ⇒  (definição de união)<br/>
                x ∈ A ∪ A  ⇒ (Idempotência da disjunção)<br/>
                A ∪ A<br/><br/>
                1.2.	Comutativa: A ∪ B=B ∪ A<br/>
                1.2.1.	A ∪ B ⊆ B ∪ A<br/>
                x ∈ A ∪ B ⇒ (definição de união)<br/>
                x ∈ A ∨ x ∈ B ⇒ (comutatividade da disjunção)<br/>
                x ∈ B ∪ x ∈ A ⇒ (definição de união)<br/>
                B U A<br/><br/>
                1.2.2.	B ∪ A ⊆ A ∪ B<br/>
                x ∈ B ∪ A ⇒ (definição de união)<br/>
                x ∈ B ∨ x ∈ A ⇒ (comutatividade da disjunção)<br/>
                x ∈ A ∪ x ∈ B ⇒ (definição de união)<br/>
                A U B<br/><br/>

                1.3.	Associativa: A ∪ (B ∪ C)=(A ∪ B) ∪ C<br/>
                1.3.1.	A ∪ (B ∪ C) ⊆ (A ∪ B) ∪ C<br/>
                x ∈ A ∪ (B ∪ C) ⇒ (definição de união)<br/>
                x ∈ A  ∨  x ∈ (B ∪ C) ⇒ (definição de união)<br/>
                x ∈ A ∨ (x ∈ B ∨ x ∈ C) ⇒ (Asso. Da disjunção)<br/>
                (x ∈ A ∪ x ∈ B) ∪ x ∈ C ⇒ (definição de união)<br/>
                x ∈ (A ∪ B) ∪ x ∈ C ⇒ (definição de união)<br/>
                (A ∪ B) ∪ C<br/><br/>

                1.3.2.	(A ∪ B) ∪ C ⊆ A ∪ (B ∪ C)<br/>
                x ∈ (A ∪ B) ∪ x ∈ C ⇒ (definição de união)<br/>
                x ∈ (A ∪ B) ∨ x ∈ C ⇒ (definição de união)<br/>
                (x ∈ A ∨ x ∈ B) ∨ x ∈ C ⇒ (Asso. Da disjunção)<br/>
                x ∈ A ∨ (x ∈ B ∨ x ∈ C) ⇒ (definição de união)<br/>
                x ∈ A ∪ (x ∈ B ∪ x ∈ C ) ⇒ (definição de união)<br/>
                A ∪ (B ∪ C)
                </p>
            </div>
        </div>
    </div>
</div>

<div id="source-modal5" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Questão 2.1</h4>
            </div>
            <div class="modal-body">
                Exercício 2.4: Suponha o conjunto universo S={p,q,r,s,t,u,v,w} bem como os seguintes conjuntos:<br/><br/>

                A={p,q,r,s}<br/>
                B={r,t,v}<br/>
                C={p,s,t,u}<br/>
                Determine:<br/><br/>

                a) B∩C = {t}<br/>
                b) A∪C = {p,q,r,s,t,u}<br/>
                c) ∼C = {q,r,v,w}<br/>
                d) A∩B∩C = Ø<br/>
                e) ∼(A∪B) = {v,w}<br/>
                f) (A∪B)∩∼C = {q,r,v}
            </div>
        </div>
    </div>
</div>

<div id="source-modal6" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Informações</h4>
            </div>
            <div class="modal-body">
                <b>Disciplina:</b><br/>
                Matemática Discreta - 2015/1 (CEULP/ULBRA)<br/><br/>
                <b>Professor Msc:</b><br/>Jackson Gomes<br/><br/>

                <b>Alunos:</b><br/>
                Gabriel Aires<br/>
                Gleyson Moura<br/>
                Jayanderson Soares<br/>
                Luiz Carlos<br/>
                Lucas Roese<br/>
                Marcos Batista<br/>
                Octavio Franceschetto<br/>
                Rafael Fonseca<br/>
                Silas Gonçalves<br/>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ripples.min.js"></script>
<script src="js/material.min.js"></script>
<script>
    $(document).ready(function () {
        $.material.init();
        $("#btnVerificar").click(function(){
            var v = $('input[name="optionTipo"]:checked').val();
            if(v == "Pertinencia"){
                $("#optionTipo").val("Pertinencia");
                $("#source-modal2").modal();
            }else{
                if(v == "Contingencia"){
                    $("#optionTipo2").val("Contingencia");
                    $("#source-modal3").modal();
                }else{
                    $("#formPrincipal").submit();
                }
            }
        });
    });
    function modalFunction(){
        $("#source-modal").modal();
    }
    function modalQuestao21(){
        $("#source-modal4").modal();
    }
    function modalQuestao24(){
        $("#source-modal5").modal();
    }
    function modalSobre(){
        $("#source-modal6").modal();
    }
</script>
</body>
</html>
