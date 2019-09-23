SELECT
    P.id,
    P.name,
    P.inventary_min,
    IFNULL(Op.q, 0) AS cant,
    C.name AS category,
    CASE
      WHEN IFNULL(Op.q, 0) = 0
      THEN 'Sin Stock'
      WHEN IFNULL(Op.q, 0) <= P.inventary_min
      THEN 'Poco Stock '
    END AS STATUS,
    CASE
      WHEN Opt.name  = 'entrada'
      THEN 'Entrada'
      WHEN Opt.name  IS NULL
      THEN 'Nuevo'
    END AS Condicion 
FROM
    operation AS Op 
    RIGHT OUTER JOIN product AS P ON (Op.product_id = P.id) 
    LEFT OUTER JOIN  operation_type AS Opt ON (Op.operation_type_id = Opt.id) 
    INNER JOIN category AS C ON (P.category_id = C.id)
WHERE  (CASE
      WHEN Opt.name  = 'entrada'
      THEN 'Entrada'
      WHEN Opt.name  IS NULL
      THEN 'Nuevo'
    END) <>'salida'