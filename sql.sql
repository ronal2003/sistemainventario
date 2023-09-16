INSERT INTO
    `productos`(
        `pro_codigo`,
        `pro_nombre`,
        `pro_descripcion`,
        `id_proveedor`,
        `pro_cantidad`,
        `pro_fechac`,
        `pro_hora`
    )
VALUES (
        '1',
        'arroz',
        'florhuila',
        '2',
        '2',
        CURRENT_DATE,
        CURRENT_TIME
    );