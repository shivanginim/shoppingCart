<?php
function templateFooter()
{
 $year = date('Y');
 echo <<<EOT
      </main>
      <footer>
        <div class="content-wrapper">
          <p>&copy; $year, Shopping Cart Example System</p>
        </div>
      </footer>
      <script src="script.js"></script>
    </body>
  </html>
EOT;
}
?>