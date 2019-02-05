                    </div><!--Fin de Contenido-->
		  		</div>

		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Sistema desarrollado por Andres Murillo
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url();?>js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
    var base_url="<?=base_url();?>";//convirtiendo a jascript
    </script>
    <?php if(isset($archivosjs)){
      foreach($archivosjs as $ajs){
        ?>
        <script type="text/javascript" src="<?=base_url()?><?=$ajs;?>"></script>
        <?php
      }
    }?>
    <script src="<?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>js/custom.js"></script>
  </body>
</html>