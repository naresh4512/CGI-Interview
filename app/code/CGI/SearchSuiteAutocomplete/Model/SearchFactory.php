<?php


namespace CGI\SearchSuiteAutocomplete\Model;

use Magento\Framework\ObjectManagerInterface as ObjectManager;

/**
 * SearchFactory class for Search model
 */
class SearchFactory
{
    /**
     * @var ObjectManager
     */
    protected $objectManager = null;

    /**
     * @var string
     */
    protected $map;

    /**
     * Factory constructor
     *
     * @param ObjectManager $objectManager
     * @param array $map
     */
    public function __construct(
        ObjectManager $objectManager,
        array $map = []
    ) {
        $this->objectManager = $objectManager;
        $this->map           = $map;
    }

    /**
     *
     * @param string $param
     * @param array $arguments
     * @return SearchInterface
     * @throws UnexpectedValueException
     */
    public function create($param, array $arguments = [])
    {
        if (isset($this->map[$param])) {
            $instance = $this->objectManager->create($this->map[$param], $arguments);
        } else {
            $instance = $this->objectManager->create(
                '\CGI\SearchSuiteAutocomplete\Model\Search\Suggested',
                $arguments
            );
        }

        if (!$instance instanceof SearchInterface) {
            throw new \UnexpectedValueException(
                'Class ' . get_class(
                    $instance
                ) . ' should be an instance of \CGI\SearchSuiteAutocomplete\Model\SearchInterface'
            );
        }

        return $instance;
    }
}
