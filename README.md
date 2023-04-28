When executing TreeRepositoryTest -> test_findByFruitId_returnsCorrectTree, the test fails as not Tree can be found for
the provided id.

This happens as the QueryBuilder in TreeRepository line 19 builds a wrong query (converting the uuid which was given
into a BSON id).

The problem can be mitigated by
- setting the targetDocument to Fruit::class in Branch
- renaming the id property to e.g. fruitId
- not having Tree -> Branch -> Fruits but only Tree -> Fruit