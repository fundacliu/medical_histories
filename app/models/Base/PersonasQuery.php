<?php

namespace Base;

use \Personas as ChildPersonas;
use \PersonasQuery as ChildPersonasQuery;
use \Exception;
use \PDO;
use Map\PersonasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'personas' table.
 *
 *
 *
 * @method     ChildPersonasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPersonasQuery orderByNombres($order = Criteria::ASC) Order by the nombres column
 * @method     ChildPersonasQuery orderByApellidos($order = Criteria::ASC) Order by the apellidos column
 * @method     ChildPersonasQuery orderByCedula($order = Criteria::ASC) Order by the cedula column
 * @method     ChildPersonasQuery orderByNacimiento($order = Criteria::ASC) Order by the nacimiento column
 * @method     ChildPersonasQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     ChildPersonasQuery orderByProfesion($order = Criteria::ASC) Order by the profesion column
 * @method     ChildPersonasQuery orderByLugarNacimiento($order = Criteria::ASC) Order by the Lugar_nacimiento column
 * @method     ChildPersonasQuery orderByRegistro($order = Criteria::ASC) Order by the registro column
 * @method     ChildPersonasQuery orderByIdSexo($order = Criteria::ASC) Order by the id_sexo column
 * @method     ChildPersonasQuery orderByIdTipoCedula($order = Criteria::ASC) Order by the id_tipo_cedula column
 *
 * @method     ChildPersonasQuery groupById() Group by the id column
 * @method     ChildPersonasQuery groupByNombres() Group by the nombres column
 * @method     ChildPersonasQuery groupByApellidos() Group by the apellidos column
 * @method     ChildPersonasQuery groupByCedula() Group by the cedula column
 * @method     ChildPersonasQuery groupByNacimiento() Group by the nacimiento column
 * @method     ChildPersonasQuery groupByDireccion() Group by the direccion column
 * @method     ChildPersonasQuery groupByProfesion() Group by the profesion column
 * @method     ChildPersonasQuery groupByLugarNacimiento() Group by the Lugar_nacimiento column
 * @method     ChildPersonasQuery groupByRegistro() Group by the registro column
 * @method     ChildPersonasQuery groupByIdSexo() Group by the id_sexo column
 * @method     ChildPersonasQuery groupByIdTipoCedula() Group by the id_tipo_cedula column
 *
 * @method     ChildPersonasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersonasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersonasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersonasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPersonasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPersonasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPersonasQuery leftJoinSexo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sexo relation
 * @method     ChildPersonasQuery rightJoinSexo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sexo relation
 * @method     ChildPersonasQuery innerJoinSexo($relationAlias = null) Adds a INNER JOIN clause to the query using the Sexo relation
 *
 * @method     ChildPersonasQuery joinWithSexo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Sexo relation
 *
 * @method     ChildPersonasQuery leftJoinWithSexo() Adds a LEFT JOIN clause and with to the query using the Sexo relation
 * @method     ChildPersonasQuery rightJoinWithSexo() Adds a RIGHT JOIN clause and with to the query using the Sexo relation
 * @method     ChildPersonasQuery innerJoinWithSexo() Adds a INNER JOIN clause and with to the query using the Sexo relation
 *
 * @method     ChildPersonasQuery leftJoinTipo_cedula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tipo_cedula relation
 * @method     ChildPersonasQuery rightJoinTipo_cedula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tipo_cedula relation
 * @method     ChildPersonasQuery innerJoinTipo_cedula($relationAlias = null) Adds a INNER JOIN clause to the query using the Tipo_cedula relation
 *
 * @method     ChildPersonasQuery joinWithTipo_cedula($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tipo_cedula relation
 *
 * @method     ChildPersonasQuery leftJoinWithTipo_cedula() Adds a LEFT JOIN clause and with to the query using the Tipo_cedula relation
 * @method     ChildPersonasQuery rightJoinWithTipo_cedula() Adds a RIGHT JOIN clause and with to the query using the Tipo_cedula relation
 * @method     ChildPersonasQuery innerJoinWithTipo_cedula() Adds a INNER JOIN clause and with to the query using the Tipo_cedula relation
 *
 * @method     ChildPersonasQuery leftJoinHistoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Historia relation
 * @method     ChildPersonasQuery rightJoinHistoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Historia relation
 * @method     ChildPersonasQuery innerJoinHistoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Historia relation
 *
 * @method     ChildPersonasQuery joinWithHistoria($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Historia relation
 *
 * @method     ChildPersonasQuery leftJoinWithHistoria() Adds a LEFT JOIN clause and with to the query using the Historia relation
 * @method     ChildPersonasQuery rightJoinWithHistoria() Adds a RIGHT JOIN clause and with to the query using the Historia relation
 * @method     ChildPersonasQuery innerJoinWithHistoria() Adds a INNER JOIN clause and with to the query using the Historia relation
 *
 * @method     \SexoQuery|\Tipo_cedulaQuery|\HistoriaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPersonas findOne(ConnectionInterface $con = null) Return the first ChildPersonas matching the query
 * @method     ChildPersonas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPersonas matching the query, or a new ChildPersonas object populated from the query conditions when no match is found
 *
 * @method     ChildPersonas findOneById(int $id) Return the first ChildPersonas filtered by the id column
 * @method     ChildPersonas findOneByNombres(string $nombres) Return the first ChildPersonas filtered by the nombres column
 * @method     ChildPersonas findOneByApellidos(string $apellidos) Return the first ChildPersonas filtered by the apellidos column
 * @method     ChildPersonas findOneByCedula(string $cedula) Return the first ChildPersonas filtered by the cedula column
 * @method     ChildPersonas findOneByNacimiento(string $nacimiento) Return the first ChildPersonas filtered by the nacimiento column
 * @method     ChildPersonas findOneByDireccion(string $direccion) Return the first ChildPersonas filtered by the direccion column
 * @method     ChildPersonas findOneByProfesion(string $profesion) Return the first ChildPersonas filtered by the profesion column
 * @method     ChildPersonas findOneByLugarNacimiento(string $Lugar_nacimiento) Return the first ChildPersonas filtered by the Lugar_nacimiento column
 * @method     ChildPersonas findOneByRegistro(string $registro) Return the first ChildPersonas filtered by the registro column
 * @method     ChildPersonas findOneByIdSexo(int $id_sexo) Return the first ChildPersonas filtered by the id_sexo column
 * @method     ChildPersonas findOneByIdTipoCedula(int $id_tipo_cedula) Return the first ChildPersonas filtered by the id_tipo_cedula column *

 * @method     ChildPersonas requirePk($key, ConnectionInterface $con = null) Return the ChildPersonas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOne(ConnectionInterface $con = null) Return the first ChildPersonas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersonas requireOneById(int $id) Return the first ChildPersonas filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByNombres(string $nombres) Return the first ChildPersonas filtered by the nombres column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByApellidos(string $apellidos) Return the first ChildPersonas filtered by the apellidos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByCedula(string $cedula) Return the first ChildPersonas filtered by the cedula column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByNacimiento(string $nacimiento) Return the first ChildPersonas filtered by the nacimiento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByDireccion(string $direccion) Return the first ChildPersonas filtered by the direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByProfesion(string $profesion) Return the first ChildPersonas filtered by the profesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByLugarNacimiento(string $Lugar_nacimiento) Return the first ChildPersonas filtered by the Lugar_nacimiento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByRegistro(string $registro) Return the first ChildPersonas filtered by the registro column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByIdSexo(int $id_sexo) Return the first ChildPersonas filtered by the id_sexo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByIdTipoCedula(int $id_tipo_cedula) Return the first ChildPersonas filtered by the id_tipo_cedula column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersonas[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPersonas objects based on current ModelCriteria
 * @method     ChildPersonas[]|ObjectCollection findById(int $id) Return ChildPersonas objects filtered by the id column
 * @method     ChildPersonas[]|ObjectCollection findByNombres(string $nombres) Return ChildPersonas objects filtered by the nombres column
 * @method     ChildPersonas[]|ObjectCollection findByApellidos(string $apellidos) Return ChildPersonas objects filtered by the apellidos column
 * @method     ChildPersonas[]|ObjectCollection findByCedula(string $cedula) Return ChildPersonas objects filtered by the cedula column
 * @method     ChildPersonas[]|ObjectCollection findByNacimiento(string $nacimiento) Return ChildPersonas objects filtered by the nacimiento column
 * @method     ChildPersonas[]|ObjectCollection findByDireccion(string $direccion) Return ChildPersonas objects filtered by the direccion column
 * @method     ChildPersonas[]|ObjectCollection findByProfesion(string $profesion) Return ChildPersonas objects filtered by the profesion column
 * @method     ChildPersonas[]|ObjectCollection findByLugarNacimiento(string $Lugar_nacimiento) Return ChildPersonas objects filtered by the Lugar_nacimiento column
 * @method     ChildPersonas[]|ObjectCollection findByRegistro(string $registro) Return ChildPersonas objects filtered by the registro column
 * @method     ChildPersonas[]|ObjectCollection findByIdSexo(int $id_sexo) Return ChildPersonas objects filtered by the id_sexo column
 * @method     ChildPersonas[]|ObjectCollection findByIdTipoCedula(int $id_tipo_cedula) Return ChildPersonas objects filtered by the id_tipo_cedula column
 * @method     ChildPersonas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersonasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PersonasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Personas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersonasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersonasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersonasQuery) {
            return $criteria;
        }
        $query = new ChildPersonasQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPersonas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersonasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PersonasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nombres, apellidos, cedula, nacimiento, direccion, profesion, Lugar_nacimiento, registro, id_sexo, id_tipo_cedula FROM personas WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPersonas $obj */
            $obj = new ChildPersonas();
            $obj->hydrate($row);
            PersonasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPersonas|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonasTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonasTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombres column
     *
     * Example usage:
     * <code>
     * $query->filterByNombres('fooValue');   // WHERE nombres = 'fooValue'
     * $query->filterByNombres('%fooValue%'); // WHERE nombres LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombres The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByNombres($nombres = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombres)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombres)) {
                $nombres = str_replace('*', '%', $nombres);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_NOMBRES, $nombres, $comparison);
    }

    /**
     * Filter the query on the apellidos column
     *
     * Example usage:
     * <code>
     * $query->filterByApellidos('fooValue');   // WHERE apellidos = 'fooValue'
     * $query->filterByApellidos('%fooValue%'); // WHERE apellidos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apellidos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByApellidos($apellidos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apellidos)) {
                $apellidos = str_replace('*', '%', $apellidos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_APELLIDOS, $apellidos, $comparison);
    }

    /**
     * Filter the query on the cedula column
     *
     * Example usage:
     * <code>
     * $query->filterByCedula('fooValue');   // WHERE cedula = 'fooValue'
     * $query->filterByCedula('%fooValue%'); // WHERE cedula LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cedula The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByCedula($cedula = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cedula)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cedula)) {
                $cedula = str_replace('*', '%', $cedula);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_CEDULA, $cedula, $comparison);
    }

    /**
     * Filter the query on the nacimiento column
     *
     * Example usage:
     * <code>
     * $query->filterByNacimiento('fooValue');   // WHERE nacimiento = 'fooValue'
     * $query->filterByNacimiento('%fooValue%'); // WHERE nacimiento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nacimiento The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByNacimiento($nacimiento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nacimiento)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nacimiento)) {
                $nacimiento = str_replace('*', '%', $nacimiento);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_NACIMIENTO, $nacimiento, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $direccion)) {
                $direccion = str_replace('*', '%', $direccion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the profesion column
     *
     * Example usage:
     * <code>
     * $query->filterByProfesion('fooValue');   // WHERE profesion = 'fooValue'
     * $query->filterByProfesion('%fooValue%'); // WHERE profesion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $profesion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByProfesion($profesion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($profesion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $profesion)) {
                $profesion = str_replace('*', '%', $profesion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_PROFESION, $profesion, $comparison);
    }

    /**
     * Filter the query on the Lugar_nacimiento column
     *
     * Example usage:
     * <code>
     * $query->filterByLugarNacimiento('fooValue');   // WHERE Lugar_nacimiento = 'fooValue'
     * $query->filterByLugarNacimiento('%fooValue%'); // WHERE Lugar_nacimiento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lugarNacimiento The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByLugarNacimiento($lugarNacimiento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lugarNacimiento)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lugarNacimiento)) {
                $lugarNacimiento = str_replace('*', '%', $lugarNacimiento);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_LUGAR_NACIMIENTO, $lugarNacimiento, $comparison);
    }

    /**
     * Filter the query on the registro column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistro('fooValue');   // WHERE registro = 'fooValue'
     * $query->filterByRegistro('%fooValue%'); // WHERE registro LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registro The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByRegistro($registro = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registro)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $registro)) {
                $registro = str_replace('*', '%', $registro);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_REGISTRO, $registro, $comparison);
    }

    /**
     * Filter the query on the id_sexo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSexo(1234); // WHERE id_sexo = 1234
     * $query->filterByIdSexo(array(12, 34)); // WHERE id_sexo IN (12, 34)
     * $query->filterByIdSexo(array('min' => 12)); // WHERE id_sexo > 12
     * </code>
     *
     * @see       filterBySexo()
     *
     * @param     mixed $idSexo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByIdSexo($idSexo = null, $comparison = null)
    {
        if (is_array($idSexo)) {
            $useMinMax = false;
            if (isset($idSexo['min'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID_SEXO, $idSexo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSexo['max'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID_SEXO, $idSexo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_ID_SEXO, $idSexo, $comparison);
    }

    /**
     * Filter the query on the id_tipo_cedula column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTipoCedula(1234); // WHERE id_tipo_cedula = 1234
     * $query->filterByIdTipoCedula(array(12, 34)); // WHERE id_tipo_cedula IN (12, 34)
     * $query->filterByIdTipoCedula(array('min' => 12)); // WHERE id_tipo_cedula > 12
     * </code>
     *
     * @see       filterByTipo_cedula()
     *
     * @param     mixed $idTipoCedula The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByIdTipoCedula($idTipoCedula = null, $comparison = null)
    {
        if (is_array($idTipoCedula)) {
            $useMinMax = false;
            if (isset($idTipoCedula['min'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID_TIPO_CEDULA, $idTipoCedula['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTipoCedula['max'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID_TIPO_CEDULA, $idTipoCedula['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_ID_TIPO_CEDULA, $idTipoCedula, $comparison);
    }

    /**
     * Filter the query by a related \Sexo object
     *
     * @param \Sexo|ObjectCollection $sexo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonasQuery The current query, for fluid interface
     */
    public function filterBySexo($sexo, $comparison = null)
    {
        if ($sexo instanceof \Sexo) {
            return $this
                ->addUsingAlias(PersonasTableMap::COL_ID_SEXO, $sexo->getId(), $comparison);
        } elseif ($sexo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonasTableMap::COL_ID_SEXO, $sexo->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySexo() only accepts arguments of type \Sexo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sexo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function joinSexo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sexo');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Sexo');
        }

        return $this;
    }

    /**
     * Use the Sexo relation Sexo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SexoQuery A secondary query class using the current class as primary query
     */
    public function useSexoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSexo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sexo', '\SexoQuery');
    }

    /**
     * Filter the query by a related \Tipo_cedula object
     *
     * @param \Tipo_cedula|ObjectCollection $tipo_cedula The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByTipo_cedula($tipo_cedula, $comparison = null)
    {
        if ($tipo_cedula instanceof \Tipo_cedula) {
            return $this
                ->addUsingAlias(PersonasTableMap::COL_ID_TIPO_CEDULA, $tipo_cedula->getId(), $comparison);
        } elseif ($tipo_cedula instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonasTableMap::COL_ID_TIPO_CEDULA, $tipo_cedula->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTipo_cedula() only accepts arguments of type \Tipo_cedula or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tipo_cedula relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function joinTipo_cedula($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tipo_cedula');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tipo_cedula');
        }

        return $this;
    }

    /**
     * Use the Tipo_cedula relation Tipo_cedula object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Tipo_cedulaQuery A secondary query class using the current class as primary query
     */
    public function useTipo_cedulaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTipo_cedula($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tipo_cedula', '\Tipo_cedulaQuery');
    }

    /**
     * Filter the query by a related \Historia object
     *
     * @param \Historia|ObjectCollection $historia the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByHistoria($historia, $comparison = null)
    {
        if ($historia instanceof \Historia) {
            return $this
                ->addUsingAlias(PersonasTableMap::COL_ID, $historia->getIdPersona(), $comparison);
        } elseif ($historia instanceof ObjectCollection) {
            return $this
                ->useHistoriaQuery()
                ->filterByPrimaryKeys($historia->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHistoria() only accepts arguments of type \Historia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Historia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function joinHistoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Historia');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Historia');
        }

        return $this;
    }

    /**
     * Use the Historia relation Historia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HistoriaQuery A secondary query class using the current class as primary query
     */
    public function useHistoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHistoria($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Historia', '\HistoriaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPersonas $personas Object to remove from the list of results
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function prune($personas = null)
    {
        if ($personas) {
            $this->addUsingAlias(PersonasTableMap::COL_ID, $personas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the personas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonasTableMap::clearInstancePool();
            PersonasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersonasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersonasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersonasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PersonasQuery
