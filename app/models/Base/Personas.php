<?php

namespace Base;

use \Historia as ChildHistoria;
use \HistoriaQuery as ChildHistoriaQuery;
use \Personas as ChildPersonas;
use \PersonasQuery as ChildPersonasQuery;
use \Sexo as ChildSexo;
use \SexoQuery as ChildSexoQuery;
use \Tipo_cedula as ChildTipo_cedula;
use \Tipo_cedulaQuery as ChildTipo_cedulaQuery;
use \Exception;
use \PDO;
use Map\HistoriaTableMap;
use Map\PersonasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'personas' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Personas implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PersonasTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the nombres field.
     *
     * @var        string
     */
    protected $nombres;

    /**
     * The value for the apellidos field.
     *
     * @var        string
     */
    protected $apellidos;

    /**
     * The value for the cedula field.
     *
     * @var        string
     */
    protected $cedula;

    /**
     * The value for the nacimiento field.
     *
     * @var        string
     */
    protected $nacimiento;

    /**
     * The value for the direccion field.
     *
     * @var        string
     */
    protected $direccion;

    /**
     * The value for the profesion field.
     *
     * @var        string
     */
    protected $profesion;

    /**
     * The value for the lugar_nacimiento field.
     *
     * @var        string
     */
    protected $lugar_nacimiento;

    /**
     * The value for the registro field.
     *
     * @var        string
     */
    protected $registro;

    /**
     * The value for the id_sexo field.
     *
     * @var        int
     */
    protected $id_sexo;

    /**
     * The value for the id_tipo_cedula field.
     *
     * @var        int
     */
    protected $id_tipo_cedula;

    /**
     * @var        ChildSexo
     */
    protected $aSexo;

    /**
     * @var        ChildTipo_cedula
     */
    protected $aTipo_cedula;

    /**
     * @var        ObjectCollection|ChildHistoria[] Collection to store aggregation of ChildHistoria objects.
     */
    protected $collHistorias;
    protected $collHistoriasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHistoria[]
     */
    protected $historiasScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Personas object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Personas</code> instance.  If
     * <code>obj</code> is an instance of <code>Personas</code>, delegates to
     * <code>equals(Personas)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Personas The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [nombres] column value.
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Get the [apellidos] column value.
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Get the [cedula] column value.
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Get the [nacimiento] column value.
     *
     * @return string
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * Get the [direccion] column value.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Get the [profesion] column value.
     *
     * @return string
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * Get the [lugar_nacimiento] column value.
     *
     * @return string
     */
    public function getLugarNacimiento()
    {
        return $this->lugar_nacimiento;
    }

    /**
     * Get the [registro] column value.
     *
     * @return string
     */
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Get the [id_sexo] column value.
     *
     * @return int
     */
    public function getIdSexo()
    {
        return $this->id_sexo;
    }

    /**
     * Get the [id_tipo_cedula] column value.
     *
     * @return int
     */
    public function getIdTipoCedula()
    {
        return $this->id_tipo_cedula;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[PersonasTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [nombres] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setNombres($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombres !== $v) {
            $this->nombres = $v;
            $this->modifiedColumns[PersonasTableMap::COL_NOMBRES] = true;
        }

        return $this;
    } // setNombres()

    /**
     * Set the value of [apellidos] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setApellidos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apellidos !== $v) {
            $this->apellidos = $v;
            $this->modifiedColumns[PersonasTableMap::COL_APELLIDOS] = true;
        }

        return $this;
    } // setApellidos()

    /**
     * Set the value of [cedula] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setCedula($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cedula !== $v) {
            $this->cedula = $v;
            $this->modifiedColumns[PersonasTableMap::COL_CEDULA] = true;
        }

        return $this;
    } // setCedula()

    /**
     * Set the value of [nacimiento] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setNacimiento($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nacimiento !== $v) {
            $this->nacimiento = $v;
            $this->modifiedColumns[PersonasTableMap::COL_NACIMIENTO] = true;
        }

        return $this;
    } // setNacimiento()

    /**
     * Set the value of [direccion] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->direccion !== $v) {
            $this->direccion = $v;
            $this->modifiedColumns[PersonasTableMap::COL_DIRECCION] = true;
        }

        return $this;
    } // setDireccion()

    /**
     * Set the value of [profesion] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setProfesion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->profesion !== $v) {
            $this->profesion = $v;
            $this->modifiedColumns[PersonasTableMap::COL_PROFESION] = true;
        }

        return $this;
    } // setProfesion()

    /**
     * Set the value of [lugar_nacimiento] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setLugarNacimiento($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lugar_nacimiento !== $v) {
            $this->lugar_nacimiento = $v;
            $this->modifiedColumns[PersonasTableMap::COL_LUGAR_NACIMIENTO] = true;
        }

        return $this;
    } // setLugarNacimiento()

    /**
     * Set the value of [registro] column.
     *
     * @param string $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setRegistro($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->registro !== $v) {
            $this->registro = $v;
            $this->modifiedColumns[PersonasTableMap::COL_REGISTRO] = true;
        }

        return $this;
    } // setRegistro()

    /**
     * Set the value of [id_sexo] column.
     *
     * @param int $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setIdSexo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sexo !== $v) {
            $this->id_sexo = $v;
            $this->modifiedColumns[PersonasTableMap::COL_ID_SEXO] = true;
        }

        if ($this->aSexo !== null && $this->aSexo->getId() !== $v) {
            $this->aSexo = null;
        }

        return $this;
    } // setIdSexo()

    /**
     * Set the value of [id_tipo_cedula] column.
     *
     * @param int $v new value
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function setIdTipoCedula($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_tipo_cedula !== $v) {
            $this->id_tipo_cedula = $v;
            $this->modifiedColumns[PersonasTableMap::COL_ID_TIPO_CEDULA] = true;
        }

        if ($this->aTipo_cedula !== null && $this->aTipo_cedula->getId() !== $v) {
            $this->aTipo_cedula = null;
        }

        return $this;
    } // setIdTipoCedula()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PersonasTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PersonasTableMap::translateFieldName('Nombres', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombres = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PersonasTableMap::translateFieldName('Apellidos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->apellidos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PersonasTableMap::translateFieldName('Cedula', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cedula = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PersonasTableMap::translateFieldName('Nacimiento', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nacimiento = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PersonasTableMap::translateFieldName('Direccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->direccion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PersonasTableMap::translateFieldName('Profesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->profesion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PersonasTableMap::translateFieldName('LugarNacimiento', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lugar_nacimiento = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PersonasTableMap::translateFieldName('Registro', TableMap::TYPE_PHPNAME, $indexType)];
            $this->registro = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PersonasTableMap::translateFieldName('IdSexo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sexo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PersonasTableMap::translateFieldName('IdTipoCedula', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_tipo_cedula = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = PersonasTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Personas'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aSexo !== null && $this->id_sexo !== $this->aSexo->getId()) {
            $this->aSexo = null;
        }
        if ($this->aTipo_cedula !== null && $this->id_tipo_cedula !== $this->aTipo_cedula->getId()) {
            $this->aTipo_cedula = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersonasTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPersonasQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSexo = null;
            $this->aTipo_cedula = null;
            $this->collHistorias = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Personas::setDeleted()
     * @see Personas::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonasTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPersonasQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonasTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                PersonasTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSexo !== null) {
                if ($this->aSexo->isModified() || $this->aSexo->isNew()) {
                    $affectedRows += $this->aSexo->save($con);
                }
                $this->setSexo($this->aSexo);
            }

            if ($this->aTipo_cedula !== null) {
                if ($this->aTipo_cedula->isModified() || $this->aTipo_cedula->isNew()) {
                    $affectedRows += $this->aTipo_cedula->save($con);
                }
                $this->setTipo_cedula($this->aTipo_cedula);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->historiasScheduledForDeletion !== null) {
                if (!$this->historiasScheduledForDeletion->isEmpty()) {
                    \HistoriaQuery::create()
                        ->filterByPrimaryKeys($this->historiasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->historiasScheduledForDeletion = null;
                }
            }

            if ($this->collHistorias !== null) {
                foreach ($this->collHistorias as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[PersonasTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonasTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonasTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_NOMBRES)) {
            $modifiedColumns[':p' . $index++]  = 'nombres';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_APELLIDOS)) {
            $modifiedColumns[':p' . $index++]  = 'apellidos';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_CEDULA)) {
            $modifiedColumns[':p' . $index++]  = 'cedula';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_NACIMIENTO)) {
            $modifiedColumns[':p' . $index++]  = 'nacimiento';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'direccion';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_PROFESION)) {
            $modifiedColumns[':p' . $index++]  = 'profesion';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_LUGAR_NACIMIENTO)) {
            $modifiedColumns[':p' . $index++]  = 'Lugar_nacimiento';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_REGISTRO)) {
            $modifiedColumns[':p' . $index++]  = 'registro';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_ID_SEXO)) {
            $modifiedColumns[':p' . $index++]  = 'id_sexo';
        }
        if ($this->isColumnModified(PersonasTableMap::COL_ID_TIPO_CEDULA)) {
            $modifiedColumns[':p' . $index++]  = 'id_tipo_cedula';
        }

        $sql = sprintf(
            'INSERT INTO personas (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'nombres':
                        $stmt->bindValue($identifier, $this->nombres, PDO::PARAM_STR);
                        break;
                    case 'apellidos':
                        $stmt->bindValue($identifier, $this->apellidos, PDO::PARAM_STR);
                        break;
                    case 'cedula':
                        $stmt->bindValue($identifier, $this->cedula, PDO::PARAM_STR);
                        break;
                    case 'nacimiento':
                        $stmt->bindValue($identifier, $this->nacimiento, PDO::PARAM_STR);
                        break;
                    case 'direccion':
                        $stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
                        break;
                    case 'profesion':
                        $stmt->bindValue($identifier, $this->profesion, PDO::PARAM_STR);
                        break;
                    case 'Lugar_nacimiento':
                        $stmt->bindValue($identifier, $this->lugar_nacimiento, PDO::PARAM_STR);
                        break;
                    case 'registro':
                        $stmt->bindValue($identifier, $this->registro, PDO::PARAM_STR);
                        break;
                    case 'id_sexo':
                        $stmt->bindValue($identifier, $this->id_sexo, PDO::PARAM_INT);
                        break;
                    case 'id_tipo_cedula':
                        $stmt->bindValue($identifier, $this->id_tipo_cedula, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PersonasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getNombres();
                break;
            case 2:
                return $this->getApellidos();
                break;
            case 3:
                return $this->getCedula();
                break;
            case 4:
                return $this->getNacimiento();
                break;
            case 5:
                return $this->getDireccion();
                break;
            case 6:
                return $this->getProfesion();
                break;
            case 7:
                return $this->getLugarNacimiento();
                break;
            case 8:
                return $this->getRegistro();
                break;
            case 9:
                return $this->getIdSexo();
                break;
            case 10:
                return $this->getIdTipoCedula();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Personas'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Personas'][$this->hashCode()] = true;
        $keys = PersonasTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombres(),
            $keys[2] => $this->getApellidos(),
            $keys[3] => $this->getCedula(),
            $keys[4] => $this->getNacimiento(),
            $keys[5] => $this->getDireccion(),
            $keys[6] => $this->getProfesion(),
            $keys[7] => $this->getLugarNacimiento(),
            $keys[8] => $this->getRegistro(),
            $keys[9] => $this->getIdSexo(),
            $keys[10] => $this->getIdTipoCedula(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSexo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'sexo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'sexo';
                        break;
                    default:
                        $key = 'Sexo';
                }

                $result[$key] = $this->aSexo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTipo_cedula) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tipo_cedula';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tipo_cedula';
                        break;
                    default:
                        $key = 'Tipo_cedula';
                }

                $result[$key] = $this->aTipo_cedula->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collHistorias) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'historias';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'historias';
                        break;
                    default:
                        $key = 'Historias';
                }

                $result[$key] = $this->collHistorias->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Personas
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PersonasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Personas
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setNombres($value);
                break;
            case 2:
                $this->setApellidos($value);
                break;
            case 3:
                $this->setCedula($value);
                break;
            case 4:
                $this->setNacimiento($value);
                break;
            case 5:
                $this->setDireccion($value);
                break;
            case 6:
                $this->setProfesion($value);
                break;
            case 7:
                $this->setLugarNacimiento($value);
                break;
            case 8:
                $this->setRegistro($value);
                break;
            case 9:
                $this->setIdSexo($value);
                break;
            case 10:
                $this->setIdTipoCedula($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = PersonasTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNombres($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setApellidos($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCedula($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNacimiento($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDireccion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setProfesion($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLugarNacimiento($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRegistro($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIdSexo($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIdTipoCedula($arr[$keys[10]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Personas The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PersonasTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PersonasTableMap::COL_ID)) {
            $criteria->add(PersonasTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_NOMBRES)) {
            $criteria->add(PersonasTableMap::COL_NOMBRES, $this->nombres);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_APELLIDOS)) {
            $criteria->add(PersonasTableMap::COL_APELLIDOS, $this->apellidos);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_CEDULA)) {
            $criteria->add(PersonasTableMap::COL_CEDULA, $this->cedula);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_NACIMIENTO)) {
            $criteria->add(PersonasTableMap::COL_NACIMIENTO, $this->nacimiento);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_DIRECCION)) {
            $criteria->add(PersonasTableMap::COL_DIRECCION, $this->direccion);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_PROFESION)) {
            $criteria->add(PersonasTableMap::COL_PROFESION, $this->profesion);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_LUGAR_NACIMIENTO)) {
            $criteria->add(PersonasTableMap::COL_LUGAR_NACIMIENTO, $this->lugar_nacimiento);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_REGISTRO)) {
            $criteria->add(PersonasTableMap::COL_REGISTRO, $this->registro);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_ID_SEXO)) {
            $criteria->add(PersonasTableMap::COL_ID_SEXO, $this->id_sexo);
        }
        if ($this->isColumnModified(PersonasTableMap::COL_ID_TIPO_CEDULA)) {
            $criteria->add(PersonasTableMap::COL_ID_TIPO_CEDULA, $this->id_tipo_cedula);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildPersonasQuery::create();
        $criteria->add(PersonasTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Personas (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombres($this->getNombres());
        $copyObj->setApellidos($this->getApellidos());
        $copyObj->setCedula($this->getCedula());
        $copyObj->setNacimiento($this->getNacimiento());
        $copyObj->setDireccion($this->getDireccion());
        $copyObj->setProfesion($this->getProfesion());
        $copyObj->setLugarNacimiento($this->getLugarNacimiento());
        $copyObj->setRegistro($this->getRegistro());
        $copyObj->setIdSexo($this->getIdSexo());
        $copyObj->setIdTipoCedula($this->getIdTipoCedula());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getHistorias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistoria($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Personas Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildSexo object.
     *
     * @param  ChildSexo $v
     * @return $this|\Personas The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSexo(ChildSexo $v = null)
    {
        if ($v === null) {
            $this->setIdSexo(NULL);
        } else {
            $this->setIdSexo($v->getId());
        }

        $this->aSexo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSexo object, it will not be re-added.
        if ($v !== null) {
            $v->addPersonas($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSexo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSexo The associated ChildSexo object.
     * @throws PropelException
     */
    public function getSexo(ConnectionInterface $con = null)
    {
        if ($this->aSexo === null && ($this->id_sexo !== null)) {
            $this->aSexo = ChildSexoQuery::create()->findPk($this->id_sexo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSexo->addPersonass($this);
             */
        }

        return $this->aSexo;
    }

    /**
     * Declares an association between this object and a ChildTipo_cedula object.
     *
     * @param  ChildTipo_cedula $v
     * @return $this|\Personas The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTipo_cedula(ChildTipo_cedula $v = null)
    {
        if ($v === null) {
            $this->setIdTipoCedula(NULL);
        } else {
            $this->setIdTipoCedula($v->getId());
        }

        $this->aTipo_cedula = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTipo_cedula object, it will not be re-added.
        if ($v !== null) {
            $v->addPersonas($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTipo_cedula object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTipo_cedula The associated ChildTipo_cedula object.
     * @throws PropelException
     */
    public function getTipo_cedula(ConnectionInterface $con = null)
    {
        if ($this->aTipo_cedula === null && ($this->id_tipo_cedula !== null)) {
            $this->aTipo_cedula = ChildTipo_cedulaQuery::create()->findPk($this->id_tipo_cedula, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTipo_cedula->addPersonass($this);
             */
        }

        return $this->aTipo_cedula;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Historia' == $relationName) {
            return $this->initHistorias();
        }
    }

    /**
     * Clears out the collHistorias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHistorias()
     */
    public function clearHistorias()
    {
        $this->collHistorias = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHistorias collection loaded partially.
     */
    public function resetPartialHistorias($v = true)
    {
        $this->collHistoriasPartial = $v;
    }

    /**
     * Initializes the collHistorias collection.
     *
     * By default this just sets the collHistorias collection to an empty array (like clearcollHistorias());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistorias($overrideExisting = true)
    {
        if (null !== $this->collHistorias && !$overrideExisting) {
            return;
        }

        $collectionClassName = HistoriaTableMap::getTableMap()->getCollectionClassName();

        $this->collHistorias = new $collectionClassName;
        $this->collHistorias->setModel('\Historia');
    }

    /**
     * Gets an array of ChildHistoria objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersonas is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHistoria[] List of ChildHistoria objects
     * @throws PropelException
     */
    public function getHistorias(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHistoriasPartial && !$this->isNew();
        if (null === $this->collHistorias || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHistorias) {
                // return empty collection
                $this->initHistorias();
            } else {
                $collHistorias = ChildHistoriaQuery::create(null, $criteria)
                    ->filterByPersonas($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHistoriasPartial && count($collHistorias)) {
                        $this->initHistorias(false);

                        foreach ($collHistorias as $obj) {
                            if (false == $this->collHistorias->contains($obj)) {
                                $this->collHistorias->append($obj);
                            }
                        }

                        $this->collHistoriasPartial = true;
                    }

                    return $collHistorias;
                }

                if ($partial && $this->collHistorias) {
                    foreach ($this->collHistorias as $obj) {
                        if ($obj->isNew()) {
                            $collHistorias[] = $obj;
                        }
                    }
                }

                $this->collHistorias = $collHistorias;
                $this->collHistoriasPartial = false;
            }
        }

        return $this->collHistorias;
    }

    /**
     * Sets a collection of ChildHistoria objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $historias A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersonas The current object (for fluent API support)
     */
    public function setHistorias(Collection $historias, ConnectionInterface $con = null)
    {
        /** @var ChildHistoria[] $historiasToDelete */
        $historiasToDelete = $this->getHistorias(new Criteria(), $con)->diff($historias);


        $this->historiasScheduledForDeletion = $historiasToDelete;

        foreach ($historiasToDelete as $historiaRemoved) {
            $historiaRemoved->setPersonas(null);
        }

        $this->collHistorias = null;
        foreach ($historias as $historia) {
            $this->addHistoria($historia);
        }

        $this->collHistorias = $historias;
        $this->collHistoriasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Historia objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Historia objects.
     * @throws PropelException
     */
    public function countHistorias(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHistoriasPartial && !$this->isNew();
        if (null === $this->collHistorias || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHistorias) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHistorias());
            }

            $query = ChildHistoriaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonas($this)
                ->count($con);
        }

        return count($this->collHistorias);
    }

    /**
     * Method called to associate a ChildHistoria object to this object
     * through the ChildHistoria foreign key attribute.
     *
     * @param  ChildHistoria $l ChildHistoria
     * @return $this|\Personas The current object (for fluent API support)
     */
    public function addHistoria(ChildHistoria $l)
    {
        if ($this->collHistorias === null) {
            $this->initHistorias();
            $this->collHistoriasPartial = true;
        }

        if (!$this->collHistorias->contains($l)) {
            $this->doAddHistoria($l);

            if ($this->historiasScheduledForDeletion and $this->historiasScheduledForDeletion->contains($l)) {
                $this->historiasScheduledForDeletion->remove($this->historiasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHistoria $historia The ChildHistoria object to add.
     */
    protected function doAddHistoria(ChildHistoria $historia)
    {
        $this->collHistorias[]= $historia;
        $historia->setPersonas($this);
    }

    /**
     * @param  ChildHistoria $historia The ChildHistoria object to remove.
     * @return $this|ChildPersonas The current object (for fluent API support)
     */
    public function removeHistoria(ChildHistoria $historia)
    {
        if ($this->getHistorias()->contains($historia)) {
            $pos = $this->collHistorias->search($historia);
            $this->collHistorias->remove($pos);
            if (null === $this->historiasScheduledForDeletion) {
                $this->historiasScheduledForDeletion = clone $this->collHistorias;
                $this->historiasScheduledForDeletion->clear();
            }
            $this->historiasScheduledForDeletion[]= clone $historia;
            $historia->setPersonas(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSexo) {
            $this->aSexo->removePersonas($this);
        }
        if (null !== $this->aTipo_cedula) {
            $this->aTipo_cedula->removePersonas($this);
        }
        $this->id = null;
        $this->nombres = null;
        $this->apellidos = null;
        $this->cedula = null;
        $this->nacimiento = null;
        $this->direccion = null;
        $this->profesion = null;
        $this->lugar_nacimiento = null;
        $this->registro = null;
        $this->id_sexo = null;
        $this->id_tipo_cedula = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collHistorias) {
                foreach ($this->collHistorias as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collHistorias = null;
        $this->aSexo = null;
        $this->aTipo_cedula = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PersonasTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
