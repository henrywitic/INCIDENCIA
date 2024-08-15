PGDMP  )                    |            bdincidencia    12.15    16.0 ,    4           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            5           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            6           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            7           1262    16543    bdincidencia    DATABASE     ~   CREATE DATABASE bdincidencia WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Peru.1252';
    DROP DATABASE bdincidencia;
                postgres    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                postgres    false            8           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    7            �            1259    24820 	   tb_estado    TABLE     �   CREATE TABLE public.tb_estado (
    est_codigo integer NOT NULL,
    est_nombre character varying(100),
    est_color character varying(50),
    est_hex character varying(10)
);
    DROP TABLE public.tb_estado;
       public         heap    postgres    false    7            �            1259    24818    tb_estado_est_codigo_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_estado_est_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tb_estado_est_codigo_seq;
       public          postgres    false    7    211            9           0    0    tb_estado_est_codigo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tb_estado_est_codigo_seq OWNED BY public.tb_estado.est_codigo;
          public          postgres    false    210            �            1259    32998    tb_historial    TABLE     �   CREATE TABLE public.tb_historial (
    his_codigo integer NOT NULL,
    his_fecha date,
    his_hora character varying(5),
    his_asunto character varying(400),
    est_codigo integer,
    tic_codigo integer,
    usu_codigo integer
);
     DROP TABLE public.tb_historial;
       public         heap    postgres    false    7            �            1259    32996    tb_historial_his_codigo_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_historial_his_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tb_historial_his_codigo_seq;
       public          postgres    false    7    213            :           0    0    tb_historial_his_codigo_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tb_historial_his_codigo_seq OWNED BY public.tb_historial.his_codigo;
          public          postgres    false    212            �            1259    16554 
   tb_oficina    TABLE     �   CREATE TABLE public.tb_oficina (
    ofi_codigo integer NOT NULL,
    ofi_nombre character varying(150),
    are_codigo integer
);
    DROP TABLE public.tb_oficina;
       public         heap    postgres    false    7            �            1259    16557    tb_oficina_ofi_codigo_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_oficina_ofi_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tb_oficina_ofi_codigo_seq;
       public          postgres    false    7    202            ;           0    0    tb_oficina_ofi_codigo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tb_oficina_ofi_codigo_seq OWNED BY public.tb_oficina.ofi_codigo;
          public          postgres    false    203            �            1259    24812 	   tb_ticket    TABLE       CREATE TABLE public.tb_ticket (
    tic_codigo integer NOT NULL,
    tic_numero character varying(20),
    tic_fecha date,
    est_codigo integer,
    tic_asunto character varying(400),
    tic_hora character varying(5),
    usu_codigo integer,
    col_codigo integer
);
    DROP TABLE public.tb_ticket;
       public         heap    postgres    false    7            �            1259    24810    tb_ticket_tic_codigo_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_ticket_tic_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tb_ticket_tic_codigo_seq;
       public          postgres    false    7    209            <           0    0    tb_ticket_tic_codigo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tb_ticket_tic_codigo_seq OWNED BY public.tb_ticket.tic_codigo;
          public          postgres    false    208            �            1259    24806    tb_trabajador    TABLE     �   CREATE TABLE public.tb_trabajador (
    tra_codigo integer NOT NULL,
    tra_dni character varying(8),
    tra_apellidos character varying(150),
    tra_nombres character varying(150),
    ofi_codigo integer
);
 !   DROP TABLE public.tb_trabajador;
       public         heap    postgres    false    7            �            1259    24804    tb_trabajador_tra_codigo_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_trabajador_tra_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tb_trabajador_tra_codigo_seq;
       public          postgres    false    207    7            =           0    0    tb_trabajador_tra_codigo_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tb_trabajador_tra_codigo_seq OWNED BY public.tb_trabajador.tra_codigo;
          public          postgres    false    206            �            1259    16579 
   tb_usuario    TABLE     @  CREATE TABLE public.tb_usuario (
    usu_codigo integer NOT NULL,
    usu_sesion character varying(100),
    usu_tipo character varying(100),
    usu_nombres character varying(100),
    usu_apellidos character varying(100),
    usu_password character varying(100),
    ofi_codigo integer,
    usu_activo character(1)
);
    DROP TABLE public.tb_usuario;
       public         heap    postgres    false    7            �            1259    16585    tb_usuario_usu_codigo_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_usuario_usu_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tb_usuario_usu_codigo_seq;
       public          postgres    false    204    7            >           0    0    tb_usuario_usu_codigo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tb_usuario_usu_codigo_seq OWNED BY public.tb_usuario.usu_codigo;
          public          postgres    false    205            �
           2604    24823    tb_estado est_codigo    DEFAULT     |   ALTER TABLE ONLY public.tb_estado ALTER COLUMN est_codigo SET DEFAULT nextval('public.tb_estado_est_codigo_seq'::regclass);
 C   ALTER TABLE public.tb_estado ALTER COLUMN est_codigo DROP DEFAULT;
       public          postgres    false    211    210    211            �
           2604    33001    tb_historial his_codigo    DEFAULT     �   ALTER TABLE ONLY public.tb_historial ALTER COLUMN his_codigo SET DEFAULT nextval('public.tb_historial_his_codigo_seq'::regclass);
 F   ALTER TABLE public.tb_historial ALTER COLUMN his_codigo DROP DEFAULT;
       public          postgres    false    212    213    213            �
           2604    16589    tb_oficina ofi_codigo    DEFAULT     ~   ALTER TABLE ONLY public.tb_oficina ALTER COLUMN ofi_codigo SET DEFAULT nextval('public.tb_oficina_ofi_codigo_seq'::regclass);
 D   ALTER TABLE public.tb_oficina ALTER COLUMN ofi_codigo DROP DEFAULT;
       public          postgres    false    203    202            �
           2604    24815    tb_ticket tic_codigo    DEFAULT     |   ALTER TABLE ONLY public.tb_ticket ALTER COLUMN tic_codigo SET DEFAULT nextval('public.tb_ticket_tic_codigo_seq'::regclass);
 C   ALTER TABLE public.tb_ticket ALTER COLUMN tic_codigo DROP DEFAULT;
       public          postgres    false    209    208    209            �
           2604    24809    tb_trabajador tra_codigo    DEFAULT     �   ALTER TABLE ONLY public.tb_trabajador ALTER COLUMN tra_codigo SET DEFAULT nextval('public.tb_trabajador_tra_codigo_seq'::regclass);
 G   ALTER TABLE public.tb_trabajador ALTER COLUMN tra_codigo DROP DEFAULT;
       public          postgres    false    206    207    207            �
           2604    16594    tb_usuario usu_codigo    DEFAULT     ~   ALTER TABLE ONLY public.tb_usuario ALTER COLUMN usu_codigo SET DEFAULT nextval('public.tb_usuario_usu_codigo_seq'::regclass);
 D   ALTER TABLE public.tb_usuario ALTER COLUMN usu_codigo DROP DEFAULT;
       public          postgres    false    205    204            /          0    24820 	   tb_estado 
   TABLE DATA           O   COPY public.tb_estado (est_codigo, est_nombre, est_color, est_hex) FROM stdin;
    public          postgres    false    211   �2       1          0    32998    tb_historial 
   TABLE DATA           w   COPY public.tb_historial (his_codigo, his_fecha, his_hora, his_asunto, est_codigo, tic_codigo, usu_codigo) FROM stdin;
    public          postgres    false    213   83       &          0    16554 
   tb_oficina 
   TABLE DATA           H   COPY public.tb_oficina (ofi_codigo, ofi_nombre, are_codigo) FROM stdin;
    public          postgres    false    202   �3       -          0    24812 	   tb_ticket 
   TABLE DATA           �   COPY public.tb_ticket (tic_codigo, tic_numero, tic_fecha, est_codigo, tic_asunto, tic_hora, usu_codigo, col_codigo) FROM stdin;
    public          postgres    false    209   �4       +          0    24806    tb_trabajador 
   TABLE DATA           d   COPY public.tb_trabajador (tra_codigo, tra_dni, tra_apellidos, tra_nombres, ofi_codigo) FROM stdin;
    public          postgres    false    207   �6       (          0    16579 
   tb_usuario 
   TABLE DATA           �   COPY public.tb_usuario (usu_codigo, usu_sesion, usu_tipo, usu_nombres, usu_apellidos, usu_password, ofi_codigo, usu_activo) FROM stdin;
    public          postgres    false    204   �7       ?           0    0    tb_estado_est_codigo_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tb_estado_est_codigo_seq', 6, true);
          public          postgres    false    210            @           0    0    tb_historial_his_codigo_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tb_historial_his_codigo_seq', 55, true);
          public          postgres    false    212            A           0    0    tb_oficina_ofi_codigo_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tb_oficina_ofi_codigo_seq', 39, true);
          public          postgres    false    203            B           0    0    tb_ticket_tic_codigo_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tb_ticket_tic_codigo_seq', 26, true);
          public          postgres    false    208            C           0    0    tb_trabajador_tra_codigo_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tb_trabajador_tra_codigo_seq', 5, true);
          public          postgres    false    206            D           0    0    tb_usuario_usu_codigo_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tb_usuario_usu_codigo_seq', 13, true);
          public          postgres    false    205            �
           2606    16596    tb_oficina tb_oficina_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.tb_oficina
    ADD CONSTRAINT tb_oficina_pkey PRIMARY KEY (ofi_codigo);
 D   ALTER TABLE ONLY public.tb_oficina DROP CONSTRAINT tb_oficina_pkey;
       public            postgres    false    202            �
           2606    24817    tb_ticket tb_ticket_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.tb_ticket
    ADD CONSTRAINT tb_ticket_pkey PRIMARY KEY (tic_codigo);
 B   ALTER TABLE ONLY public.tb_ticket DROP CONSTRAINT tb_ticket_pkey;
       public            postgres    false    209            /   |   x�%�K�0C��)��G@)b;�
3������9H�K?��]��FC�ҩ&\ �L_��]+S
=&j�ԅ��x.巉}�\A=p���1*��W�*���xoG7<�.Ѡ|���j�9����!�      1   i   x���=@0@�z�{&�d��)(�$t��贯��6�S΂	��#��#)mI;�u��*I)�۸�S\���E���|�Sp� ����� �(�0L+u      &   �   x�MOKn!]�S�U	J�,-�L-�=&R����Q�vg���nE���1	e[..�@
��(ں�}P��D�C�i�re�BXy}����W��MZ�B���b��,���?�#�.m �TD���r?`�|�Q���f��3��t��5��pD+�3r�2�w�����s|>i�=.�&*�=en�����k�dx���E�q������s�Q�      -   ]  x��U�n�0<�_�p���cɛ`�5[[r%9@�\s)Z��*���ĉ`:hF3���Ԣ���|�am�,;CB�T[�[A�sy����ϲ@�@�if4 [ҀJ�,P��*��.�uQ��BS�N��`2�s��`o Gܢ2k8�E��c�m��)iA�R	��m�) �6��^���R$y�FG��4�䬥d�4��D#M��D�#ߤA�gO9_X�aG
��VS�)�]�>��%��"�������dV�z6\��y�bZ"�驛Y[�8�Z�hM:M�U,�M�E��)���P32��K��57h7$�i�r`0��G�^N�L��A�H��� o�	�f�p,��<�}�乢\��SE��lb,jY4a?v��� �+����3kx<���)���&Ԩ��F!��C!�U�<f�]90Z�J��!	�Uܕ��P�r�(齘���x����=g���/�^�����8Ry5������K�z�M͸��Z��G��"�;"ܐ�����O��5��"<f��p��� ��e�;߇��XC�6���	�1Z�{��zһ������r�f��ر?/�6�j)^�_j�a�A���N-k���ڧ����O���?��Y�      +   �   x�5�1� @�ٜ"'����`�DZP�������3̋#k��#��w�>�\���7N`�җ�n�8L�������8y�ppj�e��#$z�:\��T�*w��Y"��!i�|���k�`g�����אj��V��H������������*9      (   �   x�M��
�0�s�{Y��uǰյR[h'��E��A��h�4������|�>@���Xc\1^?�-"����NюW�T�Gb�|���å ��1x��D�7zٸ*w.D�5�1���b�=E�F�BE�R53�g����r���5�����'C����*��'?��ק���2;7�     