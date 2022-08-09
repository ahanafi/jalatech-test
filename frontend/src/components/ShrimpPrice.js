import React from 'react';
import FilterBar from './FilterBar';
import Navbar from './Navbar';
import {
    Grid,
    GridItem,
    Flex,
    Box,
    Text
} from '@chakra-ui/react';
import BannerImage from './BannerImage';
import LabUdang from './../images/lab-udang.png';
import PanenUdang from './../images/panen-udang.png';
import Dojeto from './../images/dojeto.png';
import SmartFarm from './../images/smart-farm.jpeg';
import DistributionMap from './DistributionMap';

const ShrimpPrice = () => {
    return (
        <>
            <Navbar/>
            <FilterBar />
            <Box px={100}>
                <Grid templateColumns='repeat(2, 1fr)' gap={6} mt={5}>
                    <GridItem w='100%'>
                        <BannerImage src={LabUdang} />
                    </GridItem>
                    <GridItem w='100%'>
                        <BannerImage src={PanenUdang} />
                    </GridItem>
                </Grid>

                <Flex color='white' mt={25}>
                    <DistributionMap/>
                    <Flex w='40%'>
                        <Box w='60%' bg='tomato'>
                            <Text>Box 3</Text>
                        </Box>
                        <Box w='60%' bg='tomato'>
                            <Text>Box 3</Text>
                        </Box>
                    </Flex>
                </Flex>

                <Grid templateColumns='repeat(2, 1fr)' gap={6} mt={5}>
                    <GridItem w='100%'>
                        <BannerImage src={Dojeto} />
                    </GridItem>
                    <GridItem w='100%'>
                        <BannerImage src={SmartFarm} />
                    </GridItem>
                </Grid>
            </Box>
        </>
    );
}

export default ShrimpPrice;