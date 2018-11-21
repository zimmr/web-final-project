<?php
  class Padronizacao{

      public static function converterMaiMin($v):string{
        return ucwords(strtolower($v));
      }

      public static function antiXXS($v):string{
          return htmlspecialchars($v);
      }

      public static function apararString($v):string{
          return trim($v);
      }

      public static function adicionarBarras($v):string{
          return addslashes($v);
      }

      public static function padronizar($v):string{
          return self::converterMaiMin(self::adicionarBarras(self::antiXXS(self::apararString($v))));
      }

      public static function padronizarBas($v):string{
          return self::adicionarBarras(self::antiXXS(self::apararString($v)));
      }

      
   }
 ?>
