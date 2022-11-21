
<!DOCTYPE html>
<html>
<head>
<title>Avaliação</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
	<link rel="stylesheet" type="text/css" href="form1.css">
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<div class="container_form">
    <h1>Formulário de avaliação</h1>

    <form class="form" action="avaliacao.php" method="post">
                                
                                    
     <div class="form_servicos">
                                    
    <label for="desempenho" class="form_message_label">Desempenho</label>
    <select name="desempenho" class="dropdown" required>                              
            <option selected disabled class="form_select_option" value="">Selecione</option>
                    <option value="cabeleleira" class="form_select_option">Excelente</option>
                                            <option value="designer-de-sombracelha" class="form_select_option">Bom</option>
                                            <option value="depiladora" class="form_select_option">Ruim</option>                    
                                            <option value="esteticista" class="form_select_option">Muito ruim</option>                  
                                       
                                    </select>
			 </di>
                            </select>
                              
                                    <div class="form_message">
                                        
                                        <label for="message" class="form_message_label"> Especifique mais sua avaliação</label>
                                        <textarea name="mensagem" id="message" cols="30" rows="3" class="form_input message_input" required></textarea>

                                    </div>

                                    <div class="submit">

                                      <input type="hidden" name="acao" value="enviar">
                                      <button type="submit" name="Submit" class="submit_btn" >Concluir</button>
                                    
                                    </div>
                            </form>

                    </div>
	</div>
	<div class="agileits_copyright text-center">
	</div>
</body>
</html>

